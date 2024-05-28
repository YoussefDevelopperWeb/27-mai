import React, { useEffect, useState } from "react";
import { useSearchParams } from "react-router-dom";
import Footer from "../components/Layout/Footer";
import Header from "../components/Layout/Header";
import ProductCard from "../components/Route/ProductCard/ProductCard";
import styles from "../styles/styles";
import { useStateContext } from "../Contexts/ContextProvider";
// sampleProductData.js

  
const AdminProducts = () => {
    const [searchParams] = useSearchParams();
    const categoryData = searchParams.get("category");
    const [prData, setPrData] = useState([]);
    const {loggedAdminProducts: products, categories} = useStateContext();

    useEffect( _ => {



        if (categoryData === null) {

            setPrData(products);

        } else {
            const cat = categories.find(c => c.nom_cat === categoryData);
            if (cat) {
                const filteredProducts = products.filter(i => i.id_cat === cat.id);
                setPrData(filteredProducts);
            } else {
                setPrData([]);
            }
        }

    }, [categoryData, products, categories]);

    return (
      
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
    );
};

export default AdminProducts;
