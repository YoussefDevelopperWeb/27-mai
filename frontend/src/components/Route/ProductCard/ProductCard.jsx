import React, { useEffect, useState } from "react";
import { AiFillHeart, AiFillStar, AiOutlineEye, AiOutlineHeart, AiOutlineShoppingCart, AiOutlineStar } from "react-icons/ai";
import { Link } from "react-router-dom";
import styles from "../../../styles/styles";
import ProductDetailsCard from "../ProductDetailsCard/ProductDetailsCard";

const ProductCard = ({ data }) => {
    const [click, setClick] = useState(false);
    const [open, setOpen] = useState(false);
    // const [product_name, setProduct_name] = useState("");
    useEffect(_ => {
    }, [])

    const d = data.nom_produit;
    const product_name = d.replace(/\s+/g, "-");

    console.log("hello", product_name)

    return (
        <>
        <div className="w-full h-[370px] bg-white rounded-lg shadow-sm p-3 relative cursor-pointer">
            <div className="flex justify-end"></div>
            <Link to={`/product/${product_name}`}>
            <img
                src={data.image_produit}
                alt="image"
                className="w-full h-[170px] object-contain"
            />
            </Link>
            <Link to="/">
            <h5 className={`${styles.shop_name}`}>{data.nom_produit}</h5>
            </Link>
            <Link to={`/product/${product_name}`}>
            <h4 className="pb-3 font-[500]">
                {data.nom_produit && data.nom_produit.length > 40 ? data.nom_produit.slice(0, 40) + "..." : data.nom_produit}
            </h4>

            <div className="flex">
                <AiFillStar
                className="mr-2 cursor-pointer"
                size={20}
                color="#F6BA00"
                />
                <AiFillStar
                className="mr-2 cursor-pointer"
                size={20}
                color="#F6BA00"
                />
                <AiFillStar
                className="mr-2 cursor-pointer"
                size={20}
                color="#F6BA00"
                />
                <AiFillStar
                className="mr-2 cursor-pointer"
                color="#F6BA00"
                size={20}
                />
                <AiOutlineStar
                size={20}
                className="mr-2 cursor-pointer"
                color="#F6BA00"
                />
            </div>

            <div className="py-2 flex items-center justify-between">
                <div className="flex">
                <h5 className={`${styles.productDiscountPrice}`}>
                    {data.prix_produit === 0 ? data.prix_produit : data.prix_produit}$
                </h5>
                <h4 className={`${styles.price}`}>
                    {data.prix_produit ? data.prix_produit + " $" : null}
                </h4>
                </div>
                <span className="font-[400] text-[17px] text-[#68d284]">
                100 sold
                </span>
            </div>
            </Link>


            {/* side options */}
            <div>
                {click ? (
                <AiFillHeart
                    size={22}
                    className="cursor-pointer absolute right-2 top-5"
                    onClick={() => setClick(!click)}
                    color={click ? "red" : "#333"}
                    title="Remove from wishlist"
                />
                ) : (
                <AiOutlineHeart
                    size={22}
                    className="cursor-pointer absolute right-2 top-5"
                    onClick={() => setClick(!click)}
                    color={click ? "red" : "#333"}
                    title="Add to wishlist"
                />
                )}
                <AiOutlineEye
                    size={22}
                    className="cursor-pointer absolute right-2 top-14"
                    onClick={() => setOpen(!open)}
                    color="#333"
                    title="Quick view"
                />
                <AiOutlineShoppingCart
                size={25}
                className="cursor-pointer absolute right-2 top-24"
                onClick={() => setOpen(!open)}
                color="#444"
                title="Add to cart"
                />
                {
                    open ? (
                        <ProductDetailsCard setOpen={setOpen} data={data} />
                    ) : null
                }
            </div>
        </div>
        </>
    );
};

export default ProductCard;
