<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/';
const API_VER = 'v1/';
const API = API_URL + API_VER;

export default {

    data() {

        return {

            movies: [],
            genres: [],
            tags: [],
        }
    },
    methods: {
        getAllMoviesData() {

            axios.get(API + 'movie/all')
                .then(res => {

                    const data = res.data;
                    const success = data.success;

                    const response = data.response;

                    const movies = response.movies;
                    const genres = response.genres;
                    const tags = response.tags;

                    if (success) {

                        this.movies = movies;
                        this.genres = genres;
                        this.tags = tags;
                    }
                })
                .catch(err => console.log);
        }
    },
    mounted() {
        this.getAllMoviesData();
    }
}
</script>

<template>
    <div>
        <h1>Movies</h1>
        <ul>
            <li v-for="movie in movies" :key="movie.id">
                <h2>Name: </h2>{{ movie.name }} <br>
                <h2>Year: </h2>{{ movie.year }}<br>
                <h2>Cash Out: </h2>{{ movie.cashOut }}<br>
                <ul>
                    <li v-for="tag in movie.tags" :key="tag.id">
                        {{ tag.name }}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<style scoped>
div {
    margin: 20px;
}

h2 {
    display: inline;
}

ul,
li {
    list-style-type: none;
    margin: 10px auto;
}
</style>
