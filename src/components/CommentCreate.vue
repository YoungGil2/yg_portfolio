<template>
    <div>
         <b-input-group :prepend="name" class="mt-3">
            <b-form-textarea id="textarea" v-model="context" placeholder="코멘트를 달아주세요" rows="3" max-rows="6">

            </b-form-textarea>
            <b-input-group-append>
                <b-button variant="info" @click="isSubComment ? creareSubComment() : creareComment()">작성하기</b-button>
            </b-input-group-append>
        </b-input-group>
    </div>
</template>
<script>
import data from '@/data';

export default {
    name: 'CommentCreare',
    props: {
        contentId: Number,
        commentId: Number,
        isSubComment: Boolean,
        CommentReload: Function,
        subCommentToggle: Function,
        reloadSubComments: Function,
    },
    data() {
        return {
            name: "김영길",
            context: '',
        }
    },
    methods: {
       creareComment(){
            data.Comment.push({
                comment_id: data.Comment[data.Comment.length - 1].comment_id + 1,
                user_id: 1,
                content_id: this.contentId,
                context: this.context,
                created_at: '2020-01-31 14:49:52',
                updated_at: null
            });
            this.CommentReload();
            this.context = "";
       },
       creareSubComment(){
            data.SubComment.push({
                subcomment_id: data.SubComment[data.SubComment.length - 1].subcomment_id + 1,
                user_id: 1,
                comment_id: this.commentId,
                context: this.context,
                created_at: '2020-01-31 14:49:52',
                updated_at: null
            });
            this.subCommentToggle();
            this.reloadSubComments();
            this.context = "";
       } 
    },
}
</script>