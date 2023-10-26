import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import chat from './components/chat.vue';
import post from './components/post.vue';



const app = createApp({});
app.component('chat',chat);
app.component('post',post);
app.mount('#app');
