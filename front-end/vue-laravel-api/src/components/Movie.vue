<script>

import axios from 'axios';

export default {
    name: "Movie",
    data() {
        return {

        }
    },
    mounted() {

        axios.get('http://localhost:8000/api/v1/movie/all')
            .then(res => {

                const data = res.data;
                const success = data.success;
                const movies = data.response;

                console.log(movies);
            })
            .catch(err => console.error(err));
    }
}
</script>

<template>
    <h1>Movie</h1>
    <ul>
        <li v-for="(movie, index) in movies">
            {{ movie.name }}
        </li>
</ul>
</template>

<style scoped></style>
