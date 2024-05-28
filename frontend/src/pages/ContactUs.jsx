import React, { useState } from 'react'
import Header from '../components/Layout/Header'
import Footer from '../components/Layout/Footer'
import axiosClient from '../axios-client';
import { useNavigate } from 'react-router-dom';

function ContactUs() {
    const [email, setEmail] = useState("");
    const [message, setMessage] = useState("");
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();

    const handleSubmit = e => {
        e.preventDefault()
        const data = {id_client: 10, description_fb: message, evaluation_fb: 4, titre_fb: "reclamation"};
        setLoading(true)
        axiosClient.post('/feedback', data)
        .then(_ =>{
            setLoading(false)
            navigate("/");
        })
        .catch(err => console.error( err))
    }

    return (
        <>
            {loading &&
                <div className="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
                <div className="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
            </div>}

        <Header activeHeading={4}/>
        <div className="min-h-screen bg-gray-100 flex items-center justify-center p-6">
            <div className="bg-white shadow-md rounded-lg p-8 max-w-lg w-full">
                <h2 className="text-2xl font-bold mb-6 text-gray-800 text-center">Contact Us</h2>
                <form
                    onSubmit={handleSubmit}
                    className="space-y-4">
                {/* <div>
                    <label className="block text-sm font-medium text-gray-700">Name</label>
                    <input
                    type="text"
                    className="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Your Name"
                    />
                </div> */}
                <div>
                    <label className="block text-sm font-medium text-gray-700">Email</label>
                    <input
                    type="email"
                    className="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Your Email"
                    value={email}
                    onChange={e => setEmail(e.target.value)}
                    />
                </div>
                <div>
                    <label className="block text-sm font-medium text-gray-700">Message</label>
                    <textarea
                    className="mt-1 block w-full px-3 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    rows="4"
                    placeholder="Your Message"
                    value={message}
                    onChange={e => setMessage(e.target.value)}
                    ></textarea>
                </div>
                <div>
                    <button
                    className="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                    Send Message
                    </button>
                </div>
                </form>
                <div className="mt-6 text-center">
                <p className="text-gray-600">Or reach us at:</p>
                <p className="text-gray-800 font-medium">contact@example.com</p>
                <p className="text-gray-800 font-medium">+1 234 567 890</p>
                </div>
            </div>
        </div>
        <Footer/>
        </>
    )
}

export default ContactUs
