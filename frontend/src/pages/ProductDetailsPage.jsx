import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import Footer from '../components/Layout/Footer'
import Header from '../components/Layout/Header'
import ProductDetails from "../components/Products/ProductDetails";
import { productData } from '../static/data';
import SuggestedProduct from "../components/Products/SuggestedProduct";
import { useStateContext } from '../Contexts/ContextProvider';

const ProductDetailsPage = () => {
    const {name} = useParams();
    const [prData,setPrData] = useState(null);
    const productName = name.replace(/-/g," ");
    const {products} = useStateContext();

    // console.log(productName)
    // console.log(products)

    useEffect(() => {
        const data = products.find(ele => ele.nom_produit === productName);
        setPrData(data);
    }, [products])

    console.log("datahh", prData)

  return (
    <div>
        <Header />
        <ProductDetails data={prData} />
         {/* {
            prData && <SuggestedProduct data={prData} />
         } */}
        <Footer />
    </div>
  )
}

export default ProductDetailsPage
