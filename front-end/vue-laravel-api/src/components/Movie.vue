<script>

import axios from 'axios';

export default {
    name: "Movie",
    data() {
        return {
            // Dichiaro l'array "movies" dove recupererò i dati dal json.
            movies: []
        }
    },
    methods: {
        getAllMovies() {
            const url = 'http://localhost:8000/api/movie/all';
            axios.get(url)
                .then(res => {

                    const data = res.data;
                    const success = data.success;
                    const movies = data.response;

                    // Richiamo l'array
                    this.movies = data.movies;

                    console.log(movies);
                })
                .catch(err => console.error(err));
        }
    },
    mounted() {
        this.getAllMovies();
    }
}
</script>

<template>
    <h1>Movies</h1>
    <ul>
        <li v-for="movie in movies">
            <h2>Name: </h2>{{ movie.name }} <br>
            <h2>Year: </h2>{{ movie.year }}<br>
            <h2>Cash Out: </h2>{{ movie.cashOut }}<br>
        </li>
</ul>
</template>

<style scoped>
h2 {
    display: inline;
}

li {
    margin: 10px auto;
}
</style>
