import {createContext, useContext, useEffect, useState} from 'react'
import axiosClient from '../axios-client'


const StateContext = createContext({
    user: null,
    token: null,
    notification: null,
    categories: null,
    products: null,
    panier: null,
    setNotification: _ => {},
    setUser: _ => {},
    setToken: _ => {},
    setCategories: _ => {},
    setProducts: _ => {},
    setPanier: _ => {},
    getPanier: _ => {},
})

const ContextProvider = ({children}) => {
    const [user, setUser] = useState({})
    const [token, _setToken] = useState(localStorage.getItem('ACCESS_TOKEN'))
    const [notification, _setNotification] = useState('')
    const [categories, setCategories] = useState([]);
    const [products, setProducts] = useState([]);
    const [panier, setPanier] = useState([]);


    const getProducts = () => {
        axiosClient.get('/produits')
        .then(data => setProducts(data.data))
        .catch(err => console.error(err))
    }

    const getPanier = () => {
        axiosClient.get('/paniers')
        .then(data => setPanier(data.data))
        .catch(err => console.error(err))
    }

    useEffect(_=>{
        getProducts();
        getPanier();
    }, [])

    // console.log("provider", products)

    const setNotification = message => {
        _setNotification(message)
        setTimeout(_ => {
            _setNotification('')
        }, 5000)
    }

    const setToken = (token) => {
        _setToken(token)

        if(token) {
            localStorage.setItem('ACCESS_TOKEN', token)
        }else {
            localStorage.removeItem('ACCESS_TOKEN')
        }
    }

    return (
        <StateContext.Provider value={{
            user,
            token,
            notification,
            categories,
            products,
            panier,
            setNotification,
            setUser,
            setToken,
            setCategories,
            setProducts,
            setPanier,
            getPanier,
        }}>
            {children}
        </StateContext.Provider>
    )
}

export default ContextProvider


export const useStateContext = () => useContext(StateContext)
