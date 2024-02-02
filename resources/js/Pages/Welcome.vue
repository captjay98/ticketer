<script setup>
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";
import PageFooter from "@/Components/PageFooter.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,

        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    // user: {
    //     type: Array,
    // },
});
const user = usePage().props.auth.user;
console.log("USER", user);

const form = useForm({
    source: "",
    destination: "",
    date: "",
});

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "Trips", path: "/trips", url: "" },
    { name: "Login", path: "/login", url: "" },
    { name: "Register", path: "/register", url: "" },
];

const sources = ["Abuja", "Kaduna", "Kano", "Lagos", "Warri", "Ibadan"];

const destinations = ["Abuja", "Kaduna", "Kano", "Lagos", "Warri", "Ibadan"];

// const stations = [
//     { name: "Abuja Station", path: "/storage/home-images/abj-sta.webp" },
//     { name: "Lagos Station", path: "/storage/home-images/lagos-sta.webp" },
//     { name: "Ibadan Station", path: "/storage/home-images/ibd-sta.webp" },
//     { name: "Kaduna Station", path: "/storage/home-images/kaduna-station.webp" },
//     { name: "Kano Station", path: "/storage/home-images/kano-sta.webp" },
//     { name: "Warri Station", path: "/storage/home-images/warri-sta.webp" },
// ];

const trips = [
    {
        source: "Abuja",
        destination: "Kaduna",
        price: 4000,
        date: "12-12-23",
        source_image: "/storage/home-images/fct.webp",
        destination_image: "/storage/home-images/kaduna.webp",
    },

    {
        source: "Lagos",
        destination: "Ibadan",
        price: 4000,
        date: "24-12-23",
        source_image: "/storage/home-images/lagos.webp",
        destination_image: "/storage/home-images/ibadan.webp",
    },

    {
        source: "Kano",
        destination: "Kaduna",
        price: 6000,
        date: "10-10-24",
        source_image: "/storage/home-images/kano.webp",
        destination_image: "/storage/home-images/kaduna.webp",
    },

    {
        source: "Ibadan",
        destination: "Warri",
        price: 3000,
        date: "23-03-2024",
        source_image: "/storage/home-images/ibadan.webp",
        destination_image: "/storage/home-images/warri.webp",
    },

    {
        source: "Kano",
        destination: "Lagos",
        price: 17000,
        date: "13-02-24",
        source_image: "/storage/home-images/kano.webp",
        destination_image: "/storage/home-images/lagos.webp",
    },

    {
        source: "Kaduna",
        destination: "Abuja",
        price: 4000,
        date: "29-12-2023",
        source_image: "/storage/home-images/kaduna.webp",
        destination_image: "/storage/home-images/fct.webp",
    },

    {
        source: "Warri",
        destination: "Lagos",
        price: 4000,
        date: "30-30-2024",
        source_image: "/storage/home-images/warri.webp",
        destination_image: "/storage/home-images/lagos.webp",
    },
    {
        source: "Abuja",
        destination: "Kano",
        price: 6000,
        date: "15-05-2024",
        source_image: "/storage/home-images/fct.webp",
        destination_image: "/storage/home-images/kano.webp",
    },
];

const reviews = [
    {
        user: {
            avatar: "/storage/home-images/john.webp",
            name: " Uzumaki Naruto",
        },
        text: "I really Enjoyed Riding on This Train, It was comfortable, i could easily eat my Ramen on the go, and did i mention i got to buy my Ramen on time? Love it. And Kage Bunshin No jutsu could easily fit in it.",
    },
    {
        user: {
            avatar: "/storage/home-images/john-doe.webp",
            name: " Yuji Itadori",
        },
        text: "I enjoyed this ride, there were no Curses around, it was pleasant suprise.",
    },
    {
        user: {
            avatar: "/storage/home-images/john.webp",
            name: " Kamabako Gompachiro",
        },
        text: " It was okay, there were no demons to kill Humans but sadly there we no demons for me to kill also",
    },
    {
        user: {
            avatar: "/storage/home-images/john-doe.webp",
            name: " Rafael Nadal",
        },
        text: "The ride was no good It didn't even occur to me to devour a human.",
    },
    {
        user: {
            avatar: "/storage/home-images/john-doe.webp",
            name: " Sebastian Vettel",
        },
        text: "It was good, love the way it eats up the apexes",
    },
    {
        user: {
            avatar: "/storage/home-images/john.webp",
            name: " Asiwaju Bola Tinubu",
        },
        text: "Bubu really tried here, blah blah blah.",
    },
];

const searchTrips = () => {
    form.post(route("trips.search"), form.value);
};
</script>

<template>
    <Head title="Welcome To Ticketer" />
    <PageHeader :links="links" />
    <div class="w-full h-auto bg-">
        <div class="rounded-lg w-[95%] m-auto min-h-auto">
            <div
                class="mb-4 bg-[url('/storage/home-images/train2.webp')] bg-cover bg-no-repeat border-none rounded-2xl h-[230px] m-auto">
                <div class="rounded-lg bg-[hsla(0,0%,0%,0.6)] h-full">
                    <div class="flex z-0 flex-col justify-center items-center m-auto text-white relativ">
                        <div class="my-20 max-sm:my-10">
                            <h1 class="text-4xl tracking-tight text-center max-sm:text-[2rem]">
                                Book Your Train Tickets
                                <br class="md:hidden" />
                                With Ease on
                                <span class="text-green-500">Ticketer</span>
                            </h1>
                            <p class="mt-2 text-xl text-center max-sm:text-[14px] max-sm:px-12">
                                Booking is as easy as it can get on Ticketer,
                                <br class="md:hidden" />
                                And travelling is even better.
                            </p>
                        </div>
                        <form @submit.prevent="searchTrips"
                            class="flex relative flex-wrap justify-center py-1 px-1 mt-4 rounded-md md:justify-start bottom-[3.5rem] max-sm:bottom-[1.8rem]">
                            <label for="source" class="sr-only">Source</label>
                            <select
                                class="w-28 h-14 text-center bg-yellow-50 rounded-l-2xl border-none appearance-none focus:ring-0 focus:outline-none max-sm:text-[0.7rem] text-slate-900 xl:w-[180px]"
                                required name="source" id="source" v-model="form.source">
                                <option value="" disabled selected>
                                    Source
                                </option>
                                <option class="" v-for="source in sources" :key="source" :value="source">
                                    {{ source }}
                                </option>
                            </select>

                            <label for="destination" class="sr-only">Destination</label>
                            <select
                                class="w-28 h-14 text-center bg-yellow-50 border-none focus:ring-0 focus:outline-none max-sm:text-[0.7rem] text-slate-900 xl:w-[180px]"
                                required name="destination" id="destination" v-model="form.destination">
                                <option value="" disabled selected>
                                    Destination
                                </option>
                                <option class="rounded-md hover:bg-green-400 active:bg-green-400 text-md"
                                    v-for="destination in destinations" :key="destination" :value="destination">
                                    {{ destination }}
                                </option>
                            </select>
                            <input
                                class="w-28 h-14 text-center bg-yellow-50 border-none focus:outline-none max-sm:text-[0.7rem] max-sm:rounded-r-2xl text-slate-900 xl:w-[180px] focus:ring-none"
                                disabled type="date" :v-model="form.date" id="date" placeholder="date" />
                            <button
                                class="py-2 px-4 w-28 bg-green-500 rounded-r-2xl shadow-2xl duration-300 hover:text-white hover:bg-green-700 active:bg-green-900 shadow-green-500 max-sm:mt-2 animate-all max-sm:rounded-xl text-slate-800">
                                Find Trip
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-12 h-auto bg-yellow-50/20 max-sm:mt-28">
                <h2 class="mb-2 font-medium text-left text-[1.5rem]">
                    Our Destinations
                </h2>
                <div class="">
                    <div
                        class="grid gap-5 m-auto w-full md:grid-cols-4 md:grid-rows-2 max-sm:grid-cols-4 max-sm:grid-rows- max-sm:h[600px] md:h-[250px] lg:h-[350px]">
                        <div
                            class="col-start-1 col-end-2 row-start-1 row-end-3 rounded-xl shadow-lg hover:shadow-2xl max-sm:col-start-1 max-sm:col-end-3 max-sm:row-start-1 max-sm:row-end-3">
                            <img class="w-full h-full bg-white rounded-lg" width="300" height="300"
                                :src="'/storage/home-images/kaduna-station.webp'" alt="Train Station" />
                            <span
                                className="relative bottom-8 py-1 px-4 ml-2 text-center text-white rounded-lg text-[12px] bg-black/70">Kaduna
                            </span>
                        </div>
                        <div
                            class="col-start-2 col-end-3 row-start-1 row-end-2 rounded-xl shadow-lg hover:shadow-2xl max-sm:col-start-3 max-sm:col-end-5 max-sm:row-start-1 max-sm:row-end-2">
                            <img class="w-full h-full bg-white rounded-lg" width="200" height="200"
                                :src="'/storage/home-images/abuja-station.webp'" alt="Train Station" />
                            <span
                                className="relative bottom-8 py-1 px-4 ml-2 text-center text-white rounded-lg text-[12px] bg-black/70">Abuja
                            </span>
                        </div>
                        <div
                            class="col-start-2 col-end-3 row-start-2 row-end-3 rounded-xl shadow-lg hover:shadow-2xl max-sm:col-start-3 max-sm:col-end-5 max-sm:row-start-2 max-sm:row-end-3">
                            <img class="w-full h-full bg-white rounded-lg shadow-xl"
                                :src="'/storage/home-images/lagos-station.webp'" width="300" height="300"
                                alt="Train Station" />
                            <span
                                className="relative bottom-8 py-1 px-4 ml-2 text-center text-white rounded-lg text-[12px] bg-black/70">Lagos
                            </span>
                        </div>
                        <div
                            class="col-start-3 col-end-4 row-start-1 row-end-3 rounded-xl shadow-xl hover:shadow-2xl max-sm:col-start-3 max-sm:col-end-5 max-sm:row-start-3 max-sm:row-end-5">
                            <img class="w-full h-full bg-white rounded-lg shadow-xl hover:shadow-2xl"
                                :src="'/storage/home-images/kano-station.webp'" width="200" height="200"
                                alt="Train Station" />
                            <span
                                className="relative bottom-8 py-1 px-4 ml-2 text-center text-white rounded-lg text-[12px] bg-black/70">Kano
                            </span>
                        </div>
                        <div
                            class="col-start-4 col-end-5 row-start-1 row-end-2 rounded-xl shadow-lg hover:shadow-2xl max-sm:col-start-1 max-sm:col-end-3 max-sm:row-start-3 max-sm:row-end-4">
                            <img class="w-full h-full bg-white rounded-lg shadow-xl hover:shadow-2xl"
                                :src="'/storage/home-images/ibd-sta.webp'" width="300" height="300" alt="Train Station" />
                            <span
                                className="relative bottom-8 py-1 px-4 ml-2 text-center text-white rounded-lg text-[12px] bg-black/70">Ibadan
                            </span>
                        </div>

                        <div
                            class="col-start-4 col-end-5 row-start-2 row-end-3 rounded-xl shadow-lg hover:shadow-2xl max-sm:col-start-1 max-sm:col-end-3 max-sm:row-start-4 max-sm:row-end-5">
                            <img class="w-full h-full bg-white rounded-lg shadow-xl hover:shadow-2xl"
                                :src="'/storage/home-images/station.webp'" width="300" height="300" alt="Train Station" />
                            <span
                                className="relative bottom-8 py-1 px-4 ml-2 text-center text-white rounded-lg text-[12px] bg-black/70">Warri
                            </span>
                        </div>
                    </div>
                </div>
                <div class="py-8 mt-8 min-h-auto bg-green-50/20">
                    <h2 class="mb-2 font-medium text-left text-[1.5rem]">
                        Next Trips
                    </h2>
                    <div class="flex overflow-auto gap-6 justify-center py-8 pl-20 max-sm:pl-80" tab-index="0">
                        <div v-for="trip in trips" :key="trip.id"
                            class="mt-2 rounded-lg shadow-2xl bg-yellow-50/50 h-[13.5rem] w-[20rem]">
                            <div class="flex justify-center w-[20rem]">
                                <div class="w-[50%] h-[65%]">
                                    <img :src="trip.source_image" alt="Source station" loading="lazy"
                                        class="rounded-tl-lg h-[8rem] w-[10rem]" />

                                    <p class="font-medium text-center py-[0.3rem] text-[0.9rem]">
                                        {{ trip.source }}
                                    </p>
                                </div>
                                <div class="w-[50%] h-[65%] rounded-lg">
                                    <img :src="trip.destination_image" alt="Destination station" loading="lazy"
                                        class="rounded-tr-lg h-[8rem] w-[10rem]" />
                                    <p class="font-medium text-center py-[0.3rem] text-[0.9rem]">
                                        {{ trip.destination }}
                                    </p>
                                </div>
                            </div>
                            <div class="px-3 pt-0 text-center">
                                <p class="mb-1 font-semibold text-[0.9rem]">
                                    {{ trip.date }}
                                </p>
                                <p class="font-semibold text-[1.0rem]">
                                    NGN{{ trip.price }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-8 bg-yellow-50/20">
                <div class="flex overflow-y-scroll flex-wrap justify-between">
                    <div class="lg:w-[30%] mt-4 md: md:w-[30%] m-auto rounded-xl">
                        <div class="rounded-xl h-[33rem] w-[16rem]">
                            <video class="w-full rounded-xl" :src="'/storage/home-images/train-vid.mp4'"
                                alt="Train Interior" autoplay loop muted loading="lazy">
                                <track :src="'/storage/home-images/train-vid.mp4'" kind="Interior view of the train" />
                            </video>
                        </div>
                    </div>

                    <div
                        class="max-sm:w-full m-auto md:mt-6 md:w-[60%] md:max-h-[30rem] overflow-y-auto w-[65%] grid grid-cols-2 md:grid-cols-2 xl:grid-cols-3 flex-wrap gap-2">
                        <div v-for="review in reviews" :key="review.id"
                            class="flex flex-wrap justify-between my-4 mx-1 rounded-lg shadow-2xl sm:w-full min-h-64 bg-green-700/30 shadow-green-100 md:w-[13rem] lg:w-[14rem]">
                            <p class="px-4 pt-4 text-[0.8rem]">
                                "{{ review.text }}"
                            </p>
                            <div class="flex items-center py-2 my-2 w-full">
                                <div class="ml-4 w-14 h-12">
                                    <img :src="review.user.avatar" class="w-full h-full rounded-full" alt="Customer Image"
                                        loading="lazy" />
                                </div>
                                <div class="py-1 px-1">
                                    <h3 class="px-2 text-[1.0rem]">
                                        {{ review.user.name }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 px-2 h-auto bg-yellow-50/20">
                <div class="flex flex-wrap justify-center">
                    <div class="grid grid-cols-4 justify-center my-6 xl:gap-20 max-sm:grid max-sm:grid-cols-2">
                        <div class="my-4 w-48 h-56">
                            <div class="flex flex-wrap py-4 px-6 justify center">
                                <p class="mt-2 w-full text-5xl text-center">
                                    2M+
                                </p>
                                <p class="mt-4 w-full font-semibold text-center">
                                    Passengers Moved
                                </p>
                                <p class="mt-4 w-full text-center">
                                    Lorem ipsum dolor sit amet, qui minim labore
                                    adipisicing minim sint
                                </p>
                            </div>
                        </div>
                        <div class="my-4 w-48 h-56">
                            <div class="flex flex-wrap py-4 px-6 justify center">
                                <p class="mt-2 w-full text-5xl text-center">
                                    20K+
                                </p>
                                <p class="mt-4 w-full font-semibold text-center">
                                    Trips Completed
                                </p>
                                <p class="mt-4 w-full text-center">
                                    Lorem ipsum dolor sit amet, qui minim labore
                                    adipisicing minim sint
                                </p>
                            </div>
                        </div>
                        <div class="my-4 w-48 h-56">
                            <div class="flex flex-wrap py-4 px-6 justify center">
                                <p class="mt-2 w-full text-5xl text-center">
                                    15+
                                </p>
                                <p class="mt-4 w-full font-semibold text-center">
                                    Destinations
                                </p>
                                <p class="mt-4 w-full text-center">
                                    Lorem ipsum dolor sit amet, qui minim labore
                                    adipisicing minim sint
                                </p>
                            </div>
                        </div>
                        <div class="my-4 w-48 h-56">
                            <div class="flex flex-wrap py-4 px-6 justify center">
                                <p class="mt-2 w-full text-5xl text-center">
                                    729
                                </p>
                                <p class="mt-4 w-full font-semibold text-center">
                                    Committed Staff
                                </p>
                                <p class="mt-4 w-full text-center">
                                    Lorem ipsum dolor sit amet, qui minim labore
                                    adipisicing minim sint
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <PageFooter />
</template>
