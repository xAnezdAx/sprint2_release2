const clientId = 'b97792a68ece495ba338866face5f4cf';
const clientSecret = '4fe3591599ef496b8462e28c28fdc8f8'; 
const artistId = '0aIcU4OHpKl7lpcRQp32Eo';

//flujo de autenticacion para ontener el token de acceso
//que nos permite realizar peticiones a la API de Spotify
// Codificar el clientId y clientSecret en base64
const basicAuth = btoa(`${clientId}:${clientSecret}`);

// Parámetros para la solicitud de token
const requestOptions = {
    method: 'POST',
    headers: {
        'Authorization': `Basic ${basicAuth}`,
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'grant_type=client_credentials'
};

// URL para obtener el token de acceso
const tokenUrl = 'https://accounts.spotify.com/api/token';

// Función para obtener el token de acceso
async function getAccessToken() {
    try {
        const response = await fetch(tokenUrl, requestOptions);
        const data = await response.json();

        const accessToken = data.access_token;
        return accessToken;
    } catch (error) {
        console.log('Error al obtener el token de acceso:', error);
        return null;
    }
}

// URL para obtener los álbumes de un artista específico
// la api de spotify nos permite obtener 50 albumes por peticion
const albumsUrl = `https://api.spotify.com/v1/artists/${artistId}/albums?limit=50`;

// Función para obtener todos los álbumes de un artista, validamos el token de acceso y hacemos la peticion
async function getArtistAlbums() {
    try {
        const accessToken = await getAccessToken();

        if (!accessToken) {
            console.log('No se pudo obtener el token de acceso.');
            return;
        }

        // Configuración de la petición
        const requestOptions = {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`
            }
        };

        let albums = [];

        // con esta peticion recibimos los primeros 50 albumes que nos limita la api
        let response = await fetch(albumsUrl, requestOptions);
        let data = await response.json();

        albums = albums.concat(data.items);
//crl + k + c
        // // Obtener los álbumes restantes, si hay más de 50
        // while (data.next) {
        //     response = await fetch(data.next, requestOptions);
        //     data = await response.json();

        //     albums = albums.concat(data.items);
        // } 


        // Mostrar los nombres de los álbumes en la lista
        const albumList = document.getElementById('album-list');
        albums.forEach(album => {
            const listItem = document.createElement('li');
            listItem.textContent = album.name;
            albumList.appendChild(listItem);
        });
    } catch (error) {
        console.log('Error al obtener los álbumes:', error);
    }
}

getArtistAlbums();