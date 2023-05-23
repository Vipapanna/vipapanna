<template>
  <input
    class="h-10 rounded-3xl w-[20rem] self-center bg-white bg-opacity-20 drop-shadow-md text-center text-white lg:mr-[31rem] lg:w-[30rem]"
      v-model="search"
      name="query"
      type="text"
      placeholder="Vypapajte si to..."
    />
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      search: '',
    };
  },
  methods: {
    async performSearch() {
      const res = await axios.get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/search', {
        params: { search: this.search },
      });
      console.log('Search successful', res);
    },
    log() {
      console.log(this.search);
    },
  },
  watch: {
    search: {
      handler: 'performSearch',
      immediate: true,
    },
  },
};
</script>
