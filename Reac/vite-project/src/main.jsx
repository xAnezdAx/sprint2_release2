import React from 'react'
import ReactDOM from 'react-dom/client'
import FormularioDatos from './FormularioDatos'
import ListaDatos from './ListaDatos'
import 'bootstrap/dist/css/bootstrap.css';

//import './index.css'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <FormularioDatos />
    <ListaDatos />
  </React.StrictMode>,
)
