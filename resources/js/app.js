require('./bootstrap');
import '../css/app.css'
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import $ from 'jquery'
import axios from "axios";
import {ref, reactive, toRef, toRefs, onMounted} from 'vue'
import '@fortawesome/fontawesome-free/scss/fontawesome.scss'
const app = createApp({
    data: () => ({
        text: 'test',
        value: 0,
        dis: true,
        channel: '',
        replyId : 0,
        imageData:null
    }),
    methods: {
        hideDis() {
            this.dis = false;
        },
        showDIs() {
            this.dis = true;
        },
        testCilck(){
            window.location.href ='#comment'+this.value;
        },
        reply(id){
            this.replyId = id;
        },
        handelImage(event){
            this.imageData = event.target.files[0]
        },
        handleAxios(){
            const File = new FormData();
            File.append('images' , this.imageData)
            axios.post('./test2' , File).then(res => console.log(res.data))
/*            axios.post('./test2' , {
                file : this.text
            })
            .then(res => $(".test2").html(res.data))
            .catch(err => console.log(err))*/
        }
    },

    mounted() {
        $(".icon-reply-comment-channel").click(()=>{
            $(".form-reply-comment").stop().fadeToggle(100)
            $(".blur-all-page").stop().fadeIn(200)
        })
        $(".icon-btn-menu-REPLY-index-page").click(()=>{
            $(".form-new-comment").stop().fadeToggle(100)
            $(".blur-all-page").stop().fadeIn(200)
        })
        $(".icon-btn-menu-left-index-page").click(() => {
            $(".form-new-channel").stop().fadeToggle(100)
            $(".blur-all-page").stop().fadeIn(200)

        })
        $(".btn-register-exit").click(() => {
            $(".form-new-channel").stop().fadeToggle(100)
            $(".form-new-comment").stop().fadeToggle(100)
            $(".blur-all-page").stop().fadeOut(200)
            $(".form-reply-comment").fadeOut(100)


        })
        $(".menu-icon-header").click(() => {
            $(".menu-view-mobile").stop().slideToggle(200)
        })
        $(".exit-menu-mobile a").click(() => {
            $(".menu-view-mobile").stop().slideToggle(200)
        })
        $(".menu-icon-header-search").click(() => {
            $(".group-form-search").stop().fadeIn(200)
            $(".blur-all-page").stop().fadeIn(100)
        })
        $(".blur-all-page").click(() => {
            $(".group-form-search").stop().fadeOut(100)
            $(".blur-all-page").stop().fadeOut(200)
            $(".form-new-channel").stop().fadeOut(200)
            $(".form-new-comment").stop().fadeOut(200)
            $(".form-reply-comment").fadeOut(100)
        })
    },
})
app.mount('#app');
