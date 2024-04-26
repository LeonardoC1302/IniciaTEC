if(document.querySelector('#map')){
    const lat = 9.85425;
    const lng = -83.9074;
    const zoom = 16;

    const map = L.map('map').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="map__heading">ITCR</h2>
            <p class="map__text">Instituto Tecnológico de Costa Rica</p>
        `)
        .openPopup();
}