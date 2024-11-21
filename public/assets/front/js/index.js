/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// This example adds a map with markers, using web components.

// async function initMap() {
//     console.log("Maps JavaScript API loaded.");
//   }

//   window.initMap = initMap;



/**
//  * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// Initialize and add the map
// let map;

// async function initMap() {
//   // The location of Uluru
//   const position = { lat: -25.344, lng: 131.031 };
//   // Request needed libraries.
//   //@ts-ignore
//   const { Map } = await google.maps.importLibrary("maps");
//   const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

//   // The map, centered at Uluru
//   map = new Map(document.getElementById("map"), {
//     zoom: 4,
//     center: position,
//     mapId: "DEMO_MAP_ID",
//   });

  // The marker, positioned at Uluru
//   const marker = new AdvancedMarkerElement({
//     map: map,
//     position: position,
//     title: "Uluru",
//   });
// }

// initMap();

// Fungsi untuk mendapatkan koordinat dari alamat menggunakan OpenStreetMap Nominatim API
function getCoordinates(adres) {
    var url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
        adres
    )}`;
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (data.length > 0) {
                var lat = data[0].lat;
                var lon = data[0].lon;

                // Inisialisasi peta berdasarkan koordinat yang didapat
                var map = L.map("map").setView([lat, lon], 17);

                // Tambahkan tile layer dari OpenStreetMap
                L.tileLayer(
                    "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

                    {
                        maxZoom: 19,
                        attribution:
                            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    }
                ).addTo(map);

                // Tambahkan marker di lokasi hasil geocoding
                var marker = L.marker([lat, lon])
                    .addTo(map)
                    .bindPopup("<b>Lokasi Kantor Kami</b><br />" + adres)
                    .openPopup();
            } else {
                console.error("Koordinat tidak ditemukan untuk adres ini.");
            }
        })
        .catch((error) => console.error("Error fetching coordinates:", error));
}

// Panggil fungsi untuk mendapatkan koordinat berdasarkan adres dari database
getCoordinates(adres);
