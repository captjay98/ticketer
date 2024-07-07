const Ziggy = {
    url: "https://localhost",
    port: null,
    defaults: {},
    routes: {
        "paystack.webhooks": { uri: "paystack/webhooks", methods: ["POST"] },
        "sanctum.csrf-cookie": {
            uri: "sanctum/csrf-cookie",
            methods: ["GET", "HEAD"],
        },
        "ignition.healthCheck": {
            uri: "_ignition/health-check",
            methods: ["GET", "HEAD"],
        },
        "ignition.executeSolution": {
            uri: "_ignition/execute-solution",
            methods: ["POST"],
        },
        "ignition.updateConfig": {
            uri: "_ignition/update-config",
            methods: ["POST"],
        },
        dashboard: { uri: "dashboard", methods: ["GET", "HEAD"] },
        "profile.edit": { uri: "profile", methods: ["GET", "HEAD"] },
        "profile.update": { uri: "profile", methods: ["PATCH"] },
        "profile.destroy": { uri: "profile", methods: ["DELETE"] },
        "trips.all": { uri: "trips", methods: ["GET", "HEAD"] },
        "trips.one": {
            uri: "trips/{trip_id}",
            methods: ["GET", "HEAD"],
            parameters: ["trip_id"],
        },
        "trips.search": { uri: "trips", methods: ["POST"] },
        "ticketypes.all": { uri: "tickettype", methods: ["GET", "HEAD"] },
        "ticketypes.select": { uri: "tickettype", methods: ["POST"] },
        "coaches.all": {
            uri: "trips/{trip_id}/coaches/{tickettype}",
            methods: ["GET", "HEAD"],
            parameters: ["trip_id", "tickettype"],
        },
        "seats.all": {
            uri: "trips/{trip_id}/coaches/{coach_id}/seats",
            methods: ["GET", "HEAD"],
            parameters: ["trip_id", "coach_id"],
        },
        "seats.reserve": { uri: "seats/reserve", methods: ["POST"] },
        pay: { uri: "pay", methods: ["GET", "HEAD"] },
        payment: { uri: "payment/callback", methods: ["GET", "HEAD"] },
        succesful: { uri: "success", methods: ["GET", "HEAD"] },
        webhook: { uri: "paystack/webhook", methods: ["POST"] },
        "ticket.create": { uri: "ticket/create", methods: ["GET", "HEAD"] },
        "ticket.show": { uri: "ticket/show", methods: ["GET", "HEAD"] },
        "admin.dashboard": { uri: "admin/dashboard", methods: ["GET", "HEAD"] },
        "admin.users.all": { uri: "admin/users", methods: ["GET", "HEAD"] },
        "admin.users.one": {
            uri: "admin/users/{user_id}",
            methods: ["GET", "HEAD"],
            parameters: ["user_id"],
        },
        "admin.users.deactivate": {
            uri: "admin/users/{user_id}",
            methods: ["PUT"],
            parameters: ["user_id"],
        },
        "admin.Travellers.all": {
            uri: "admin/travellers",
            methods: ["GET", "HEAD"],
        },
        "admin.traveller.one": {
            uri: "admin/travellers/{user_id}",
            methods: ["GET", "HEAD"],
            parameters: ["user_id"],
        },
        "admin.trips.all": { uri: "admin/trips", methods: ["GET", "HEAD"] },
        "admin.trips.showcreate": {
            uri: "admin/trips/create",
            methods: ["GET", "HEAD"],
        },
        "admin.trips.create": { uri: "admin/trips", methods: ["POST"] },
        "admin.trips.update": { uri: "admin/trips", methods: ["PATCH"] },
        "admin.trips.one": {
            uri: "admin/trips/{trip_id}",
            methods: ["GET", "HEAD"],
            parameters: ["trip_id"],
        },
        "admin.tickets.all": { uri: "admin/tickets", methods: ["GET", "HEAD"] },
        "admin.tickets.create": {
            uri: "admin/tickets/create",
            methods: ["POST"],
        },
        "admin.tickets.update": {
            uri: "admin/tickets/update",
            methods: ["PUT"],
        },
        "admin.tickets.one": {
            uri: "admin/tickets/{ticket_id}",
            methods: ["GET", "HEAD"],
            parameters: ["ticket_id"],
        },
        "admin.tickettypes.all": {
            uri: "admin/tickettypes",
            methods: ["GET", "HEAD"],
        },
        "admin.tickettypes.showcreate": {
            uri: "admin/tickettype/create",
            methods: ["GET", "HEAD"],
        },
        "admin.tickettypes.create": {
            uri: "admin/tickettype/create",
            methods: ["POST"],
        },
        "admin.tickettypes.update": {
            uri: "admin/tickettype/update",
            methods: ["PUT"],
        },
        "admin.tickettypes.one": {
            uri: "admin/tickettype/{tickettype}",
            methods: ["GET", "HEAD"],
            parameters: ["tickettype"],
        },
        "admin.coaches.all": { uri: "admin/coaches", methods: ["GET", "HEAD"] },
        "admin.coaches.showcreate": {
            uri: "admin/coaches/create",
            methods: ["GET", "HEAD"],
        },
        "admin.coaches.create": {
            uri: "admin/coaches/create",
            methods: ["POST"],
        },
        "admin.coaches.update": {
            uri: "admin/coaches/update",
            methods: ["PUT"],
        },
        "admin.coaches.one": {
            uri: "admin/coaches/{coaches}",
            methods: ["GET", "HEAD"],
            parameters: ["coaches"],
        },
        "admin.seats.all": { uri: "admin/seats", methods: ["GET", "HEAD"] },
        "admin.seats.one": {
            uri: "admin/seats/{seat_id}",
            methods: ["GET", "HEAD"],
            parameters: ["seat_id"],
        },
        "admin.bookings.all": {
            uri: "admin/bookings",
            methods: ["GET", "HEAD"],
        },
        "admin.bookings.one": {
            uri: "admin/bookings/{booking_id}",
            methods: ["GET", "HEAD"],
            parameters: ["booking_id"],
        },
        register: { uri: "register", methods: ["GET", "HEAD"] },
        login: { uri: "login", methods: ["GET", "HEAD"] },
        "password.request": {
            uri: "forgot-password",
            methods: ["GET", "HEAD"],
        },
        "password.email": { uri: "forgot-password", methods: ["POST"] },
        "password.reset": {
            uri: "reset-password/{token}",
            methods: ["GET", "HEAD"],
            parameters: ["token"],
        },
        "password.store": { uri: "reset-password", methods: ["POST"] },
        "verification.notice": {
            uri: "verify-email",
            methods: ["GET", "HEAD"],
        },
        "verification.verify": {
            uri: "verify-email/{id}/{hash}",
            methods: ["GET", "HEAD"],
            parameters: ["id", "hash"],
        },
        "verification.send": {
            uri: "email/verification-notification",
            methods: ["POST"],
        },
        "password.confirm": {
            uri: "confirm-password",
            methods: ["GET", "HEAD"],
        },
        "password.update": { uri: "password", methods: ["PUT"] },
        logout: { uri: "logout", methods: ["POST"] },
    },
};

if (typeof window !== "undefined" && typeof window.Ziggy !== "undefined") {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
