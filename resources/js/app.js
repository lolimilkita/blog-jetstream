import "./bootstrap";

import Choices from "choices.js";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

// Create multiselect element
window.choices = (element) => {
    return new Choices(element, {
        maxItemCount: 4,
        removeItemButton: true,
    });
};

Alpine.plugin(focus);

Alpine.start();

// require("./bootstrap");

// require("alpinejs");
