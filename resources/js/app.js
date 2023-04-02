
import './bootstrap';
import { createApp } from 'vue';
import router from './router';

import App from './components/App.vue';

// import { DatePickerPlugin } from "@syncfusion/ej2-vue-calendars";

// .use(DatePickerPlugin)

createApp(App).use(router).mount('#app')
