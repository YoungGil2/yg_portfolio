<template>
    <div>
        <div class="comment-list-item">
            <div class="comment-list-item-name">
                <div>{{name}}</div>
                <div>{{commentObj.created_at}}</div>
            </div>
            <div v-bind:id="'comment-list-item-context-'+commentObj.comment_id" class="comment-list-item-context">{{commentObj.context}}</div>
            <div v-bind:id="'comment-list-item-button-'+commentObj.comment_id" class="comment-list-item-button">
                <!-- <b-button variant="info" @click="CommentUpdateCreate(commentObj.comment_id,commentObj.context)">수정</b-button> -->
                <b-button variant="info" @click="CommentDelete(commentObj.comment_id)">삭제</b-button>
                <b-button variant="info" @click="subCommentToggle()">댓글 달기</b-button>
            </div>
        </div>
        <div v-if="subCommentCreateToggle">
            <CommentCreate :isSubComment="true" :commentId="commentObj.comment_id" :reloadSubComments="reloadSubComments" :subCommentToggle="subCommentToggle"/>
        </div>
        <template v-if="subCommentlist.length > 0">
            <div class="comment-list-item-subcomment-list" :key="item.subcomment_id" v-for="item in subCommentlist">
                <div class="comment-list-item-name">
                    <div>{{item.user_name}}</div>
                    <div>{{item.created_at}}</div>
                </div>
                <div class="comment-list-item-context">{{item.context}}</div>
                <div class="comment-list-item-button">
                    <!-- <b-button variant="info">수정</b-button> -->
                    <b-button variant="info" @click="SubCommentDelete(item.subcomment_id)">삭제</b-button>
                </div>
            </div>
            <div></div>
        </template>
    </div>
</template>
<script>
import data from '@/data';
import CommentCreate from './CommentCreate'

export default {
    name: 'CommentListItem',
    props: {
        commentObj: Object,
        CommentReload: Function
    },
    components: {
        CommentCreate
    },
    data() {
        // const comment_id = commentObj.comment_id;
        return {
            // comment_id : commentObj.comment_id, 
            name: data.User.filter(item => item.user_id === this.commentObj.user_id)[0].name,
            subCommentlist: 
                data.SubComment.filter(item => item.comment_id === this.commentObj.comment_id)
                .map(SubCommentItem =>({
                    ...SubCommentItem,
                    user_name: data.User.filter(item => item.user_id === SubCommentItem.user_id)[0].name
                })),
            subCommentCreateToggle : false
        }
    },
    methods: {
        subCommentToggle(){
            this.subCommentCreateToggle = !this.subCommentCreateToggle;
        },
        reloadSubComments(){
             this.subCommentlist = 
                data.SubComment.filter(item => item.comment_id === this.commentObj.comment_id)
                .map(SubCommentItem =>({
                    ...SubCommentItem,
                    user_name: data.User.filter(item => item.user_id === SubCommentItem.user_id)[0].name
                }))
        },
        CommentDelete(comment_index){
            const comment = data.Comment.findIndex(item => item.comment_index === comment_index);
            data.Comment.splice(comment, 1);
            this.CommentReload();
        },
        SubCommentDelete(Subcomment_index){
            const Subcomment = data.SubComment.findIndex(item => item.Subcomment_index === Subcomment_index);
            data.SubComment.splice(Subcomment, 1);
            this.reloadSubComments();
        },
        // CommentUpdateCreate(comment_index, comment_context){
        //     // alert(comment_index);
            
        //     document.getElementById("comment-list-item-context-"+comment_index).innerHTML = "<textarea>"+comment_context+"</textarea>";
        //     // document.getElementById("comment-list-item-button-"+comment_index).innerHTML = "<b-button variant='info' @click=CommentUpdate()>완료</b-button>";
        // },
        // CommentUpdate(){
        //     alert("dd");
        // }
    },
}
</script>
<style scoped>
.comment-list-item {
  display: flex;
  justify-content: space-between;
  padding-bottom: 1em;
}
.comment-list-item-name {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border: 0.5px solid black;
  padding: 1em;
}
.comment-list-item-context {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50em;
  border: 0.5px solid black;
}
.comment-list-item-button {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border: 0.5px solid black;
  padding: 1em;
}
.btn {
  margin-bottom: 1em;
}
.comment-list-item-subcomment-list {
  display: flex;
  justify-content: space-between;
  padding-bottom: 1em;
  margin-left: 10em;
}
</style>