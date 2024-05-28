import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import Header from "../components/Layout/Header";
import Footer from "../components/Layout/Footer";
import axiosClient from "../axios-client";
import { toast } from "react-toastify";

const EditProductPage = () => {
    const { id } = useParams();
  const [product, setProduct] = useState(null);
  const [categories, setCategories] = useState([]);
  const [selectedCategory, setSelectedCategory] = useState(null);
  const navigate = useNavigate();
  useEffect(() => {
    // Fetch product data by id
    fetchProductById(id);
    fetchAllCategories();
  }, [id]);

  useEffect(() => {
    // Set selected category when categories are fetched
    if (product && categories.length > 0) {
      setSelectedCategory(findCategoryById(product.id_cat)?.nom_cat || "");
    }
  }, [product, categories]);

  const fetchProductById = async (productId) => {
    try {
      const response = await axiosClient.get(`/produits/${productId}`);
      setProduct(response.data);
    } catch (error) {
      console.error("Error fetching product data:", error);
    }
  };

  const fetchAllCategories = async () => {
    try {
      const response = await axiosClient.get(`/categories`);
      setCategories(response.data);
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  };

  const findCategoryById = (categoryId) => {
    return categories.find((cat) => cat.id === categoryId);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axiosClient.post(`/produits/${id}`, {
        ...product,
        _method: "PUT",
      }, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
      toast.success("Product updated successfully");
      // Route to the dashboard and refresh the page
      window.location.href = "/dashboard";
    } catch (error) {
      console.error("Error updating product:", error);
    }
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    if (name === "images_produit") {
        setProduct({ ...product, [name]: e.target.files });
    }
    else {
        setProduct({ ...product, [name]: value });
    }

};
    return (
        <div className="flex flex-col min-h-screen">
            <Header activeHeading={3} />
            <div className="flex flex-grow">
                <div className="flex-grow p-4">
                    {/* Render your product edit form here */}

                  
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label
                                    htmlFor="nom_produit"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Product Name
                                </label>
                                <div className="mt-1">
                                    <input
                                        type="text"
                                        name="nom_produit"
                                        value={product?.nom_produit}
                                        onChange={handleChange}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label
                                    htmlFor="prix_produit"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Price
                                </label>
                                <div className="mt-1">
                                    <input
                                        type="text"
                                        name="prix_produit"
                                        value={product?.prix_produit}
                                        onChange={handleChange}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label
                                    htmlFor="image_produit"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Image
                                </label>
                                <div className="mt-1">
                                    <input
                                        type="file"
                                        accept="image/*"
                                        multiple
                                        name="images_produit"
                                        // value={product.image_produit}
                                        onChange={handleChange}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label
                                    htmlFor="stock_produit"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Stock
                                </label>
                                <div className="mt-1">
                                    <input
                                        type="number"
                                        name="stock_produit"
                                        value={product?.stock_produit}
                                        onChange={handleChange}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label
                                    htmlFor="reference_produit"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Reference
                                </label>
                                <div className="mt-1">
                                    <input
                                        type="text"
                                        name="reference_produit"
                                        value={product?.reference_produit}
                                        onChange={handleChange}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label
                                    htmlFor="description_produit"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Description
                                </label>
                                <div className="mt-1">
                                    <input
                                        type="text"
                                        name="description_produit"
                                        value={product?.description_produit}
                                        onChange={handleChange}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
              <label
                htmlFor="id_cat"
                className="block text-sm font-medium text-gray-700"
              >
                Category
              </label>
              <div className="mt-1">
                <select
                  name="id_cat"
                  value={selectedCategory || ""}
                  onChange={handleChange}
                  className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                >
                  <option value="">Select Category</option>
                  {categories.map((category) => (
                    <option
                      key={category.id_cat}
                      value={category.id_cat}
                    >
                      {category.nom_cat}
                    </option>
                  ))}
                </select>
              </div>
            </div>

                            <button
                                type="submit"
                                className="group relative w-full h-[40px] flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700"
                            >
                                Update
                            </button>
                        </form>
                 
                </div>
            </div>
            <Footer />
        </div>
    );
};

export default EditProductPage;
