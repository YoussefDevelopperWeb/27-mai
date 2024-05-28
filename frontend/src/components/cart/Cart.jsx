import React, { useEffect, useState } from "react";
import { RxCross1 } from "react-icons/rx";
import { IoBagHandleOutline } from "react-icons/io5";
import { HiOutlineMinus, HiPlus } from "react-icons/hi";
import styles from "../../styles/styles";
import { Link } from "react-router-dom";
import { useStateContext } from "../../Contexts/ContextProvider";
import axiosClient from "../../axios-client";

const Cart = ({ setOpenCart }) => {
    const { panier, products, getPanier, setPrix } = useStateContext();
    const [cardProducts, setCardProducts] = useState([]);
    const [total, setTotal] = useState(0);

    const getPanierProduits = () => {
        const filteredProducts = panier.map(ele => {
            const product = products.find(item => item.id === ele.id_produit);
            return product ? { ...product, quantity: ele.qtt_produit, panierId: ele.id } : null;
        }).filter(item => item !== null);
        setCardProducts(filteredProducts);
    };

    useEffect(() => {
        getPanierProduits();
    }, [panier]);

    useEffect(() => {
        const newTotal = cardProducts.reduce((acc, product) => acc + product.prix_produit * product.quantity, 0);
        setTotal(newTotal);
    }, [cardProducts]);

    useEffect(_=> {
        setPrix(total)
    }, [total])

    return (
        <div className="fixed top-0 left-0 w-full bg-[#0000004b] h-screen z-10">
            <div className="fixed top-0 right-0 min-h-full w-[25%] bg-white flex flex-col justify-between shadow-sm">
                <div>
                    <div className="flex w-full justify-end pt-5 pr-5">
                        <RxCross1
                            size={25}
                            className="cursor-pointer"
                            onClick={() => setOpenCart(false)}
                        />
                    </div>
                    <div className={`${styles.noramlFlex} p-4`}>
                        <IoBagHandleOutline size={25} />
                        <h5 className="pl-2 text-[20px] font-[500]">{panier.length} items</h5>
                    </div>
                    <br />
                    <div className="w-full border-t">
                        {cardProducts.map((product, index) => (
                            <CartSingle
                                key={index}
                                data={product}
                                getPanier={getPanier}
                            />
                        ))}
                    </div>
                </div>
                <div className="px-5 mb-3">
                    <Link to="/checkout">
                        <div className="h-[45px] flex items-center justify-center w-[100%] bg-[#e44343] rounded-[5px]">
                            <h1 className="text-[#fff] text-[18px] font-[600]">Checkout Now (USD$ {total})</h1>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    );
};

const CartSingle = ({ data, getPanier }) => {
    const { panier } = useStateContext();
    const [value, setValue] = useState(data.quantity);
    const [loading, setLoading] = useState(false);

    const updateQuantity = (newQuantity) => {
        if (newQuantity < 1) return;
        setValue(newQuantity);
        // Optional: Update the quantity in the cart context
        // updatePanierQuantity(data.id, newQuantity);
    };

    const delFromPanier = () => {
        setLoading(true);
        axiosClient.delete(`/paniers/${data.panierId}`)
            .then(() => {
                getPanier();
                setLoading(false);
            })
            .catch(err => console.error('error: ' + err));
    };

    return (
        <div className="border-b p-4">
            <div className="w-full flex items-center">
                {loading && (
                    <div className="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
                        <div className="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
                    </div>
                )}
                <div>
                    <div
                        className={`bg-[#e44343] border border-[#e4434373] rounded-full w-[25px] h-[25px] ${styles.noramlFlex} justify-center cursor-pointer`}
                        onClick={() => updateQuantity(value + 1)}
                    >
                        <HiPlus size={18} color="#fff" />
                    </div>
                    <span className="pl-[10px]">{value}</span>
                    <div
                        className="bg-[#a7abb14f] rounded-full w-[25px] h-[25px] flex items-center justify-center cursor-pointer"
                        onClick={() => updateQuantity(value - 1)}
                    >
                        <HiOutlineMinus size={16} color="#7d879c" />
                    </div>
                </div>
                <img src={data.image_produit} alt="" className="w-[80px] h-[80px] ml-2" />
                <div className="pl-[5px]">
                    <h1>{data.name}</h1>
                    <h4 className="font-[400] text-[15px] text-[#00000082]">${data.prix_produit} * {value}</h4>
                    <h4 className="font-[600] text-[17px] pt-[3px] text-[#d02222] font-Roboto">
                        US${data.prix_produit * value}
                    </h4>
                </div>
                <RxCross1 onClick={delFromPanier} className="cursor-pointer" />
            </div>
        </div>
    );
};

export default Cart;
