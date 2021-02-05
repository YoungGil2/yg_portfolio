import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Board from '@/components/Board'
import Header from '@/components/Header'
import ContentDetail from '@/components/ContentDetail';
import Create from '@/components/Create'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorlhe',
      component: HelloWorld
    },
    {
      path: '/board/free',
      name: 'Board',
      component: Board
    },
    {
      path: '/board/free/detail/:contentId',
      name: 'ContentDetail',
      component: ContentDetail
    },
    {
      path: '/board/free/create/:contentId?',
      name: 'Create',
      component: Create
    }
  ]
})
