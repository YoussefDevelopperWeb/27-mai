import React, { useEffect, useState } from "react";
import { useSearchParams } from "react-router-dom";
import Footer from "../components/Layout/Footer";
import Header from "../components/Layout/Header";
import ProductCard from "../components/Route/ProductCard/ProductCard";
import { productData } from "../static/data";
import styles from "../styles/styles";
import { useStateContext } from "../Contexts/ContextProvider";

const ProductsPage = () => {
    const [searchParams] = useSearchParams();
    const categoryData = searchParams.get("category");
    const [prData, setPrData] = useState([]);
    const {products, categories} = useStateContext();

    useEffect( _ => {

// console.log("produits", products)

    // if (categoryData === null) {

    //     const d =
    //     productData && productData.sort((a, b) => a.total_sell - b.total_sell);
    //     setData(d);

    // } else {

    //     setData(products)
    //     const d =
    //     productData && productData.filter((i) => i.category === categoryData);
    //     setData(d);

    // }
    //    window.scrollTo(0,0);


        if (categoryData === null) {

            setPrData(products);

        } else {
            // console.log("products", products)
            // console.log("categories", categories)
            // console.log("categoryData", categoryData)

            const cat = categories.find(c => c.nom_cat === categoryData);
            if (cat) {
                const filteredProducts = products.filter(i => i.id_cat === cat.id);
                setPrData(filteredProducts);
            } else {
                setPrData([]);
            }
        }

    }, [categoryData, products, categories]);

    console.log("prdata1", prData)


    return (
        <div>
        <Header activeHeading={2} />
        <br />
        <br />
        <div className={`${styles.section}`}>
            <div className="grid grid-cols-1 gap-[20px] md:grid-cols-2 md:gap-[25px] lg:grid-cols-4 lg:gap-[25px] xl:grid-cols-5 xl:gap-[30px] mb-12">
            {prData && prData.map((i, index) => <ProductCard data={i} key={index} />)}

            </div>
            {prData && prData.length === 0 && (
            <h1 className="text-center w-full pb-[100px] text-[20px]">
                No products Found!
            </h1>
            )}
        </div>
        <Footer />
        </div>
    );
};

export default ProductsPage;
