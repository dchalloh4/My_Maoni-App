// import Dashboard from './components/Dashboard'
import Dashboard from './components/Dashboard.vue';
import DashboardLEcs from './components/lecs/Dashboard.vue';

import Class_Teacher from './pages/Class_Teacher.vue';
import Class_Teacher_Lec from './components/lecs/Teacher_class.vue';

import PersonalClass from './pages/PersonalClass.vue';
import PersonalClass_Lec from './components/lecs/PersonalClass.vue';

import Logout from './pages/Logout.vue';
import myLogoutvuevue from './pages/myLogout.vue';
import Login from './pages/Login.vue';

import Feedback from './pages/Feedback.vue';
import Feedback_Lec from './components/lecs/Feedback.vue';

import Teacher_ from './pages/Teacher_.vue';

export default [
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: Dashboard
    },
    {
        path: '/admin/class&teachers',
        name: 'admin.class&teachers',
        component: Class_Teacher
    },
    {
        path: '/admin/my-class',
        name: 'admin.MyClass',
        component: PersonalClass
    },
    {
        path: '/admin/lec/dashboard',
        name: 'admin.lec.Dashboard',
        component: Teacher_
    },
    {
        path: '/admin/logout',
        name: 'admin.logout',
        component: Logout
    },
    {
        path: '/admin/login',
        name: 'admin.login',
        component: Login
    },
    {
        path: '/admin/logout/1',
        name: 'admin.logout',
        component: myLogoutvuevue
    },
    {
        path: '/admin/feedback/:unitCode/:unitName',
        name: 'admin.feedback',
        component: Feedback,
        props: true
    },


    {
        path: '/admin/lec/dashboard',
        name: 'admin.lec.dashboard',
        component: DashboardLEcs
    },
    {
        path: '/admin/lec/class&teachers',
        name: 'admin.lec.class&teachers',
        component: Class_Teacher_Lec
    },
    {
        path: '/admin/lec/my-class',
        name: 'admin.lec.MyClass',
        component: PersonalClass_Lec
    },
    {
        path: '/admin/lec/dashboard',
        name: 'admin.lec.Dashboard',
        component: Teacher_
    },
    {
        path: '/admin/lec/logout',
        name: 'admin.logout',
        component: Logout
    },
    {
        path: '/admin/lec/login',
        name: 'admin.login',
        component: Login
    },
    {
        path: '/admin/lec/logout/1',
        name: 'admin.logout',
        component: myLogoutvuevue
    },
    {
        path: '/admin/lec/feedback/',
        name: 'admin.lec.feedback',
        component: Feedback_Lec,
        props: true
    },
]
