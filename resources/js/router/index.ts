import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import createRouterGuard from "./guards";
const routeModule = () => {
    const globalEgle = import.meta.globEager("./modules/*.ts");
    const routes: RouteRecordRaw[] = [];
    Object.entries(globalEgle).map(([key, value]) => {
        routes.push(...(value.default as RouteRecordRaw[]));
    });
    return routes;
};
const router = createRouter({
    history:createWebHistory(),
    routes: [
        {
            path:'/',
            component: () => import('../layouts/index.vue'),
            
            children:[
                {
                    path:'',
                    component: () => import("../pages/index/index.vue"),
                    name:"index",
                }
            ]
        },
        ...routeModule(),
    ]
})
createRouterGuard(router);
export default router;