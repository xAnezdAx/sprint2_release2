import React, { useState } from 'react';

const FormularioDatos = () => {
    const [nombre, setNombre] = useState('');
    const [descripcion, setDescripcion] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();

        const datos = {
            nombre: nombre,
            descripcion: descripcion,
        };

        fetch('http://127.0.0.1:8000/api/datos/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(datos),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Datos creados exitosamente:', data);
            })
            .catch(error => console.error('Error al crear los datos:', error));

        setNombre('');
        setDescripcion('');
    };

    return (
        <div className='container text-center'>
            <h1>Crear Datos</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Nombre:</label>
                    <input type="text" value={nombre} onChange={(e) => setNombre(e.target.value)} className='form-control' />
                </div>
                <div>
                    <label>Descripción:</label>
                    <input type="text" value={descripcion} onChange={(e) => setDescripcion(e.target.value)} className='form-control' />
                </div>
                <button type="submit" className='btn btn-primary btn-sm mt-4'>Guardar</button>
            </form>
        </div>
    );
};

export default FormularioDatos;
