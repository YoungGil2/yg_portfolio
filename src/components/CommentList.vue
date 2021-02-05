<template>
    <div>
        <!-- {{contentId}} -->
        <div :key="item.comment_id" v-for="item in comments">
            <CommentListItem :commentObj="item" :CommentReload="CommentReload" />
        </div>
        <CommentCreate :contentId="contentId" :CommentReload="CommentReload"/>
    </div>
</template>
<script>
import data from '@/data';
import CommentListItem from './CommentListItem';
import CommentCreate from './CommentCreate';

export default {
    name: 'CommentList',
    components: {
        CommentListItem,
        CommentCreate
    },
    props: {
        contentId: Number,
    },
    data(){
        return {
            comments: data.Comment.filter(item => item.content_id === this.contentId)
        }
    },
    methods: {
        CommentReload(){
            this.comments = data.Comment.filter(item => item.content_id === this.contentId);
        }
    }
}
</script>