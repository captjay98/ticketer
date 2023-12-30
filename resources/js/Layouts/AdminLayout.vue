<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SideBar from "@/Components/SideBar.vue";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "About", path: "/about", url: "" },
    { name: "Account", path: route("admin.dashboard"), url: "" },
];

const sideLinks = [
    {
        name: "Dashboard",
        path: route("admin.dashboard"),
        img: "/storage/icons/dashboard.svg",
        url: "/admin/dashboard",
    },

    {
        name: "Users",
        path: route("admin.users.all"),
        img: "/storage/icons/profile.svg",
        url: "/admin/users",
    },

    {
        name: "Trips",
        path: route("admin.trips.all"),
        img: "/storage/icons/applicants.png",
        url: "/admin/trips",
    },

    {
        name: "Ticket Types",
        path: route("admin.tickettypes.all"),
        img: "/storage/icons/jobs.png",
        url: "/admin/tickettypes",
    },
    {
        name: "Coaches",
        path: route("admin.coaches.all"),
        img: "/storage/icons/jobs3.png",
        url: "/admin/coaches",
    },

    {
        name: "Seats",
        path: route("admin.seats.all"),
        img: "/storage/icons/jobs3.png",
        url: "/admin/seats",
    },

    {
        name: "Bookings",
        path: route("admin.bookings.all"),
        img: "/storage/icons/jobs2.png",
        url: "/admin/bookings",
    },

    {
        name: "Tickets",
        path: route("admin.tickets.all"),
        img: "/storage/icons/jobs3.png",
        url: "/admin/tickets",
    },
];
</script>
<template>
    <AuthenticatedLayout :links="links">
        <SideBar :sideLinks="sideLinks" />

        <div class="h-auto max-w-screen rounded-md mt-10 bg-yellow-50/20">
            <div class="ml-[12%] mb-4 w-[87%] rounded-md">
                <div class="m-auto w-full rounded-md">
                    <slot />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
