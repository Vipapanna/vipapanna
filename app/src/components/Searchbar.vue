<template>
  <div class="flex flex-col">
    <input
      class="h-10 rounded-3xl w-[20rem] self-center bg-white bg-opacity-20 drop-shadow-md text-center text-white lg:mr-[31rem] lg:w-[30rem]"
      v-model="search"
      autocomplete="off"
      name="query"
      type="text"
      placeholder="Vypapajte si to..."
    />
    <div v-if="search !== ''" class="cols-auto">
      <div
        v-for="result in searchResults"
        :key="result.id"
        class="bg-white rounded-lg p-2 my-2"
      >
        <p @click="selectCard(result)" class="text-black">{{ result.title }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      search: "",
      searchResults: [],
    };
  },
  methods: {
    async performSearch() {
      const res = await axios.get(
        `https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/search?query=${this.search}`
      );
      this.searchResults = res.data.slice(0, 5).map((result) => ({
        title: result.restaurant_name,
        image: result.restaurant_image_link,
        rating: result.review,
        address: result.address,
        id: result.id,
      }));
    },
    selectCard(card) {
      this.$store.commit("setSelectedCard", card);
      this.$router.push({
        name: "RestaurantPage",
        params: { refreshKey: Date.now() },
      });
      if (this.$route.name === "RestaurantPage") {
        window.location.reload();
      }
    },
  },
  watch: {
    search: {
      handler: "performSearch",
      immediate: true,
    },
  },
};
</script>
