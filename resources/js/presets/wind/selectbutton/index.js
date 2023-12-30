export default {
    root: ({ props }) => ({
        class: [
            "shadow-sm px-2 py-1 flex flex-wrap",
            { "opacity-60 select-none pointer-events-none cursor-default": props.disabled },
        ],
    }),
    button: ({ context }) => ({
        class: [
            "relative",
            // Font
            "text-sm",
            "leading-none",

            // Flex Alignment
            "inline-flex items-center align-bottom text-center",

            // Spacing
            "px-2 py-1",

            // Shape
            "rounded-md ring-0 border-2 border-green-200",

            // Color
            {
                "bg-green-500 dark:bg-black": context.active,
                "text-black dark:text-white": context.active,
                "bg-surface-100 dark:bg-surface-700 border-primary-500 dark:border-primary-400":
                    context.active,
            },

            // States
            "focus:outline-none focus:outline-offset-0 focus:ring-primary-500 dark:focus:ring-primary-400",
            "hover:bg-surface-200 dark:hover:bg-surface-600/80",
            { "opacity-60 select-none pointer-events-none cursor-default": context.disabled },

            // Transition
            "transition duration-200",

            // Misc
            "cursor-pointer select-none overflow-hidden",
        ],
    }),
    label: {
        class: "font-semibold",
    },
};
