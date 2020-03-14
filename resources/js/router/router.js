import Vue from 'vue'
import Router from 'vue-router'


function route(path, file, name, children, meta) {
    return {
        exact: true,
        path,
        name,
        children,
        meta,
        component: require(`../pages/${file}.vue`).default
    }
}


Vue.use(Router);

const vrouter = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    /* Save The Scroll Position , Useful When Redirecting Back */
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { x: 0, y: 0 };
        }
    },
    routes: [
        route('/','inicio','main',null,{title: 'inicio'}),
        route("/home", "Home", "home", null, {title: "Home2"}),
        route('/productos', 'Productos', 'productos', null, {title: 'Productos'}),
        route("/agregar", "Agregar", "agregar", null, {title: "Agregar"}),

    ]
});

vrouter.beforeEach((to, from, next) => {
    document.title = to.meta.title + ' | Prueba';
    next()
});

export default vrouter;