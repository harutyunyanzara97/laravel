<template>

    <div>
        <div class="row">
            <div class="col-4">
                <h3>Users list</h3>
                <ul class="nav flex-column">
                    <li v-for="user in users"
                        class="nav-link"
                        :key="user.id"
                        @click="openChat(user.id)"
                        :class="{'font-weight-bold': chatUserID === user.id}">
                        <a href="#" style="color:#fff">{{ user.name }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-8">
                <div v-show="chatOpen && !loadingMessages">
                    <div class="row" style="max-height: 50vh; background: black; overflow: scroll; padding-bottom: 50px" ref="messageBox">
                        <div class="col-12" v-for="message in messages"
                             :class="{'text-right': message.sender_id !== chatUserID}">
                            <small style="color:#fff">{{ message.sender.name }} at {{ message.created_at }}</small>
                            <p style="color:#fff">
                                {{ message.message }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text"
                                       class="form-control"
                                       placeholder="New message"
                                       aria-label="New message"
                                       aria-describedby="button-addon2" v-model="newMessage">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary"
                                            type="button"
                                            id="button-addon2"
                                            @click="sendMessage">
                                        Send message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="loadingMessages">
                    <p>Loading messages... Please wait</p>
                </div>
                <div v-show="!chatOpen && !loadingMessages">
                    <p>No chat room is open. Please click on user to start a conversation</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
                users: [],
                messages: [],
                chatOpen: false,
                chatUserID: null,
                loadingMessages: false,
                newMessage: ''
            }
        },
        created () {
            let app = this
            app.loadUsers()
        },
        watch: {
            messages: function () {
                let element = this.$refs.messageBox
                element.scrollTop = element.scrollHeight
            }
        },
        methods: {
            openChat (userID) {
                let app = this
                if (app.chatUserID !== userID) {
                    app.chatOpen = true
                    app.chatUserID = userID

                    // Start pusher listener
                    Pusher.logToConsole = true

                    var pusher = new Pusher('75f4218eb9e336b5d0d7', {
                        cluster: 'ap2',
                        forceTLS: true
                    })

                    var channel = pusher.subscribe('newMessage-' + app.chatUserID + '-' + app.$root.userID) // newMessage-[chatting-with-who]-[my-id]

                    channel.bind('App\\Events\\MessageSent', function (data) {
                        if (app.chatUserID) {
                            app.messages.push(data.message)
                        }
                    })
                    // End pusher listener
                    app.loadMessages()
                }
            },
            loadUsers () {
                let app = this
                axios.get('api/users/')
                    .then((resp) => {
                        app.users = resp.data
                    })
            },
            loadMessages () {
                let app = this
                app.loadingMessages = true
                app.messages = []
                axios.post('api/messages', {
                    sender_id: app.chatUserID,
                    receiver_id: app.$root.userID
                }).then((resp) => {
                    app.messages = resp.data
                    app.loadingMessages = false
                })
            },
            sendMessage () {
                let app = this
                if (app.newMessage !== '') {
                    axios.post('api/messages/send', {
                        sender_id: app.$root.userID,
                        receiver_id: app.chatUserID,
                        message: app.newMessage
                    }).then((resp) => {
                        app.messages.push(resp.data)
                        app.newMessage = ''
                    })
                }
            }
        }
    }
</script>

<!--<template>-->
<!--    <div class="row">-->
<!--        <div class="col-8">-->
<!--            <div class="card card-default">-->
<!--                <div class="card-header">Messages</div>-->
<!--                <div class="card-body p-0">-->
<!--                    <ul class="list-unstyled" style="height:300px; overflow-y:scroll" v-chat-scroll>-->
<!--                        <li class="p-2" v-for="(message, index) in messages" :key="index">-->
<!--                            <strong>{{ message.user.name }}</strong>-->
<!--                            {{ message.message }}-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->

<!--                <input-->
<!--                    @keydown="sendTypingEvent"-->
<!--                    @keyup.enter="sendMessage"-->
<!--                    v-model="newMessage"-->
<!--                    type="text"-->
<!--                    name="message"-->
<!--                    placeholder="Enter your message..."-->
<!--                    class="form-control">-->
<!--            </div>-->
<!--            <span class="text-muted" v-if="activeUser">{{ activeUser.name }} is typing...</span>-->
<!--        </div>-->

<!--        <div class="col-4">-->
<!--            <div class="card card-default">-->
<!--                <div class="card-header">Active Users</div>-->
<!--                <div class="card-body">-->
<!--                    <ul>-->
<!--                        <li class="py-2" v-for="(user, index) in users" :key="index">-->
<!--                            {{ user.name }}-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->

<!--        props: ['user'],-->

<!--        data() {-->
<!--            return {-->
<!--                messages: [],-->
<!--                newMessage: '',-->
<!--                users: [],-->
<!--                pos: '',-->
<!--                activeUser: false,-->
<!--                typingTimer: false,-->
<!--            }-->
<!--        },-->

<!--        created() {-->

<!--            this.fetchMessages();-->
<!--            Echo.join('chat')-->
<!--                .here(user => {-->

<!--                    this.users = user;-->
<!--                })-->
<!--                .joining(user => {-->
<!--                    this.users.push(user);-->
<!--                })-->
<!--                .leaving(user => {-->
<!--                    this.users = this.users.filter(u => u.id != user.id);-->
<!--                })-->
<!--                .listen('MessageSent',(event) => {-->
<!--                    this.messages.push(event.message);-->
<!--                })-->
<!--                .listenForWhisper('typing', user => {-->
<!--                    this.activeUser = user;-->

<!--                    if (this.typingTimer) {-->
<!--                        clearTimeout(this.typingTimer);-->
<!--                    }-->

<!--                    this.typingTimer = setTimeout(() => {-->
<!--                        this.activeUser = false;-->
<!--                    }, 3000);-->
<!--                })-->

<!--        },-->

<!--        methods: {-->
<!--            fetchMessages() {-->
<!--                axios.get('messages').then(response => {-->
<!--                    this.messages = response.data;-->
<!--                })-->
<!--            },-->

<!--            sendMessage() {-->

<!--                this.messages.push({-->
<!--                    user: this.user,-->
<!--                    message: this.newMessage-->
<!--                });-->

<!--                axios.post('messages', {message: this.newMessage});-->

<!--                this.newMessage = '';-->
<!--            },-->

<!--            sendTypingEvent() {-->
<!--                Echo.join('chat')-->
<!--                    .whisper('typing', this.user);-->
<!--            },-->

<!--            Position(align = 'left') {-->
<!--                this.pos = align-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->
