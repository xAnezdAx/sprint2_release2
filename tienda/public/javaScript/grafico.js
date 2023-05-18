const clientId = 'b97792a68ece495ba338866face5f4cf'; // Reemplaza con tu Client ID de Spotify
const clientSecret = '4fe3591599ef496b8462e28c28fdc8f8'; // Reemplaza con tu Client Secret de Spotify
const albumId = '42m5GjWygoPWLPqdTN9TZB'; // Reemplaza con el ID del álbum que deseas consultar

// Codifica el Client ID y Client Secret en Base64
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

const tokenUrl = 'https://accounts.spotify.com/api/token';

const tracksUrl = `https://api.spotify.com/v1/albums/${albumId}/tracks?limit=50`;

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

async function getAlbumTracks() {
    try {
        const accessToken = await getAccessToken();

        if (!accessToken) {
            console.log('No se pudo obtener el token de acceso.');
            return;
        }

        const requestOptions = {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`
            }
        };

        const response = await fetch(tracksUrl, requestOptions);
        const data = await response.json();

        //const albumName = data.name;

        const tracks = data.items;

        const chartLabels = tracks.map(track => track.name);
        const chartData = tracks.map(track => track.duration_ms);
        console.log(chartData); 

        // gráfico Chart.js
        const ctx = document.getElementById('album-chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                label: 'Duración de las canciones en milisegundos',
                    data: chartData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 10
                    }
                }
            }
        });
    } catch (error) {
        console.log('Error al obtener las canciones del álbum:', error);
    }
}
getAlbumTracks();
