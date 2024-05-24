import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import reportWebVitals from './reportWebVitals';
import { Provider } from "react-redux";
import Store from "./redux/store";
import ContextProvider from './Contexts/ContextProvider';

ReactDOM.render(
  <Provider store={Store}>
    <ContextProvider>
    <App />
    </ContextProvider>
  </Provider>,
  document.getElementById("root")
);


reportWebVitals();
