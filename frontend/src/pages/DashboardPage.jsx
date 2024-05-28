import React from 'react';
import { Link } from 'react-router-dom';
import Footer from '../components/Layout/Footer';
import Header from '../components/Layout/Header';
import AdminProducts from './AdminProducts';

const DashboardPage = () => {
  return (
    <div className="flex flex-col min-h-screen">
      <Header activeHeading={3} />
      <div className="flex flex-grow">
        <div className="flex-grow p-4">
          <div className="mb-4">
            {/* Create Product Button */}
            <Link
              to="/dashboard/product/create"
              className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
              Create Product
            </Link>
          </div>
          <AdminProducts />
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default DashboardPage;
