<template>
    <div>
      <input v-model="searchTerm" @input="handleSearchInput" placeholder="Search location..." class="w-full p-2 rounded-md">
      <ul v-if="searchResults.length > 0" class="mt-2">
        <li v-for="result in visibleResults" :key="result.place_id" @click="selectLocation(result)" class="cursor-pointer p-2 rounded-md hover:bg-gray-100">
          {{ result.display_name }}
        </li>
      </ul>
      <div v-if="selectedLocation" class="mt-4">
        <h3 class="font-bold">Your Selected Location:</h3>
        <ul class="list-disc list-inside mt-2">
          <li>City: {{ selectedLocation.city }}</li>
          <li>Street: {{ selectedLocation.street }}</li>
          <li>Country: {{ selectedLocation.country }}</li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        searchTerm: '',
        searchResults: [],
        visibleResults: [],
        selectedLocation: this.getLastSelectedLocation()
      };
    },
    methods: {
      handleSearchInput() {
        const searchUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${this.searchTerm}&addressdetails=1&countrycodes=SK`;
        fetch(searchUrl)
          .then(response => response.json())
          .then(data => {
            this.searchResults = data;
            this.updateVisibleResults(); // Call updateVisibleResults in the correct context
          })
          .catch(error => {
            console.error('Error fetching search results:', error);
          });
      },
      selectLocation(location) {
        this.selectedLocation = {
          city: location.address.city,
          street: location.address.road,
          country: location.address.country
        };
        this.saveLastSelectedLocation(this.selectedLocation);
      },
      getLastSelectedLocation() {
        const lastSelectedLocation = localStorage.getItem('lastSelectedLocation');
        if (lastSelectedLocation) {
          return JSON.parse(lastSelectedLocation);
        }
        return null;
      },
      saveLastSelectedLocation(location) {
        localStorage.setItem('lastSelectedLocation', JSON.stringify(location));
      },
      updateVisibleResults() {
        this.visibleResults = this.searchResults.slice(0, 4);
      }
    }
  };
  </script>
  
  <style scoped>
  input, ul {
    width: 100%;
  }
  </style>
