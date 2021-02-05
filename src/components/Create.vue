<template>
    <div>
        <b-input v-model="subject" placeholder="제목을 입력해 주세요"></b-input>
        <b-textarea v-model="context" placeholder="내용을 입력해 주세요" rows="3" max-rows="6"></b-textarea>
        <button @click="updataMode ? updateContent() : uploadContent()">저장</button>
        <button @click="cancle">취소</button>
    </div>
</template>
<script>
import data from '@/data'

export default {
    name: 'Create',
    data() {
        return {
            subject: '',
            context: '',
            userId: 1,
            created_at: '2020-01-14 17:26:32',
            updated_at: null,
            updataMode: this.$route.params.contentId > 0 ? true : false
        }
    },
    created() {
        if(this.$route.params.contentId > 0){
            const contentId = Number(this.$route.params.contentId)
            this.updateObject = data.Content.filter(item => item.content_id === contentId)[0]
            this.subject = this.updateObject.title;
            this.context = this.updateObject.context;
        }
    },
    methods: {
        uploadContent() {
            let items = data.Content.sort((a,b) => {return b.content_id - a.content_id})
            const content_id = items[0].content_id + 1
            data.Content.push({
                content_id: content_id,
                user_id: this.userId,
                title: this.subject,
                context: this.context,
                created_at: this.created_at,
                updated_at: this.updated_at,
            }),
            this.$router.push({
                path: '/board/free'
            })
        },
        updateContent(){
            this.updateObject.title = this.subject;
            this.updateObject.context = this.context;
            this.$router.push({
                path: '/board/free/'
            })
        },
        cancle() {
            this.$router.push({
                path: '/board/free'
            })
        }
    }
}
</script>