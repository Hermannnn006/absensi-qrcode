import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "../css/flatpickr.styl"

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
import MyQrStream from "./Components/MyQrStream.vue";
import Presence from "./Components/Presence.vue";
import Clock from "./Components/Clock.vue";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true,
        "components": { 
            MyQrStream,
            Presence,
            Clock
        },  
    })
    .mount(el);