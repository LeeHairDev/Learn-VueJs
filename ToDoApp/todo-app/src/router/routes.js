import TaskPage from "../pages/TaskPage.vue";
import LoginPage from "../pages/LoginPage.vue"
import RegisterPage from "../pages/RegisterPage.vue"
import SummaryPage from "../pages/SummaryPage.vue"
import HomePage from "../pages/HomePage.vue"
import NotFoundErrorPage from "../pages/errors/NotFoundErrorPage.vue"


const routes = [
    {
        path: "/",
        component: HomePage,
        name: 'home',
    },
    {
        path: "/tasks",
        component: TaskPage,
        name: 'tasks',
        meta: {
            auth: true,
          },
    },
    {
        path: "/summary",
        component: SummaryPage,
        name: 'summary',
        meta: {
            auth: true,
          },
    },
    {
        path: "/login",
        component: LoginPage,
        name: 'login',
        meta: {
            guest: true
        }
    }, 
    {
        path: "/register",
        component: RegisterPage,
        name: 'register'
    },
    {
        path: "/:notFound(.*)",
        name: "error.404",
        component: NotFoundErrorPage
    }
]


export default routes;