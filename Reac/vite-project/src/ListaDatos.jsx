import React, { useEffect, useState } from 'react';

const ListaDatos = () => {
    const [datos, setDatos] = useState([]);
    const [editingId, setEditingId] = useState(null);
    const [editedData, setEditedData] = useState({
        nombre: '',
        descripcion: '',
    });

    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/datos/')
            .then(response => response.json())
            .then(data => setDatos(data))
            .catch(error => console.error(error));
    }, []);

    const handleDelete = (id) => {
        fetch(`http://127.0.0.1:8000/api/datos/${id}`, {
            method: 'DELETE',
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    setDatos(data);
                } else {
                    console.error('Error al eliminar los datos:', data.error);
                }
            })
            .catch(error => console.error('Error al realizar la llamada a la API:', error));
    };

    const handleEdit = (id, data) => {
        setEditingId(id);
        setEditedData(data);
    };

    const handleUpdate = () => {
        fetch(`http://127.0.0.1:8000/api/datos/${editingId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(editedData),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    setDatos(data);
                    setEditingId(null);
                    setEditedData({
                        nombre: '',
                        descripcion: '',
                    });
                } else {
                    console.error('Error al actualizar los datos:', data.error);
                }
            })
            .catch(error => console.error('Error al realizar la llamada a la API:', error));
    };

    return (
        <div className='container text-center'>
            <h1>Lista de Datos</h1>
            {datos.map(dato => (
                <div key={dato.id}>
                    <div className='card'>
                        {editingId === dato.id ? (
                            <div>
                                <label>Nombre:</label>
                                <input
                                    type='text'
                                    value={editedData.nombre}
                                    onChange={(e) => setEditedData({ ...editedData, nombre: e.target.value })}
                                    className='form-control'
                                />
                                <label>Descripción:</label>
                                <input
                                    type='text'
                                    value={editedData.descripcion}
                                    onChange={(e) => setEditedData({ ...editedData, descripcion: e.target.value })}
                                    className='form-control'
                                />
                            </div>
                        ) : (
                            <div>
                                <p>Nombre: {dato.nombre}</p>
                                <p>Descripción: {dato.descripcion}</p>
                            </div>
                        )}
                    </div>
                    {editingId === dato.id ? (
                        <button onClick={handleUpdate} className='btn btn-success btn-sm mt-4'>
                            Guardar
                        </button>
                    ) : (
                        <button onClick={() => handleEdit(dato.id, dato)} className='btn btn-warning btn-sm mt-4'>
                            Editar
                        </button>
                    )}
                    <button onClick={() => handleDelete(dato.id)} className='btn btn-danger btn-sm mt-4'>
                        Eliminar
                    </button>
                    <hr />
                </div>
            ))}
        </div>
    );
};

export default ListaDatos;
