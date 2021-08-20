<!--&lt;!&ndash;<template>&ndash;&gt;-->

<!--&lt;!&ndash;    <div>&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;            <div class="col-4">&ndash;&gt;-->
<!--&lt;!&ndash;                <h3>Users list</h3>&ndash;&gt;-->
<!--&lt;!&ndash;                <ul class="nav flex-column">&ndash;&gt;-->
<!--&lt;!&ndash;                    <li v-for="user in users"&ndash;&gt;-->
<!--&lt;!&ndash;                        class="nav-link"&ndash;&gt;-->
<!--&lt;!&ndash;                        :key="user.id"&ndash;&gt;-->
<!--&lt;!&ndash;                        @click="openChat(user.id)"&ndash;&gt;-->
<!--&lt;!&ndash;                        :class="{'font-weight-bold': chatUserID === user.id}">&ndash;&gt;-->
<!--&lt;!&ndash;                        <a href="#" style="color:#fff">{{ user.name }}</a>&ndash;&gt;-->
<!--&lt;!&ndash;                    </li>&ndash;&gt;-->
<!--&lt;!&ndash;                </ul>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--&lt;!&ndash;            <div class="col-8">&ndash;&gt;-->
<!--&lt;!&ndash;                <div v-show="chatOpen && !loadingMessages">&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="row" style="max-height: 50vh; background: black; overflow: scroll; padding-bottom: 50px" ref="messageBox">&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="col-12" v-for="message in messages"&ndash;&gt;-->
<!--&lt;!&ndash;                             :class="{'text-right': message.sender_id !== chatUserID}">&ndash;&gt;-->
<!--&lt;!&ndash;                            <small style="color:#fff">{{ message.sender.name }} at {{ message.created_at }}</small>&ndash;&gt;-->
<!--&lt;!&ndash;                            <p style="color:#fff">&ndash;&gt;-->
<!--&lt;!&ndash;                                {{ message.message }}&ndash;&gt;-->
<!--&lt;!&ndash;                            </p>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="col-12">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="input-group mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                <input type="text"&ndash;&gt;-->
<!--&lt;!&ndash;                                       class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                       placeholder="New message"&ndash;&gt;-->
<!--&lt;!&ndash;                                       aria-label="New message"&ndash;&gt;-->
<!--&lt;!&ndash;                                       aria-describedby="button-addon2" v-model="newMessage">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="input-group-append">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <button class="btn btn-outline-secondary"&ndash;&gt;-->
<!--&lt;!&ndash;                                            type="button"&ndash;&gt;-->
<!--&lt;!&ndash;                                            id="button-addon2"&ndash;&gt;-->
<!--&lt;!&ndash;                                            @click="sendMessage">&ndash;&gt;-->
<!--&lt;!&ndash;                                        Send message&ndash;&gt;-->
<!--&lt;!&ndash;                                    </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                <div v-show="loadingMessages">&ndash;&gt;-->
<!--&lt;!&ndash;                    <p>Loading messages... Please wait</p>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                <div v-show="!chatOpen && !loadingMessages">&ndash;&gt;-->
<!--&lt;!&ndash;                    <p>No chat room is open. Please click on user to start a conversation</p>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->
<!--&lt;!&ndash;</template>&ndash;&gt;-->

<!--&lt;!&ndash;<script>&ndash;&gt;-->
<!--&lt;!&ndash;    export default {&ndash;&gt;-->
<!--&lt;!&ndash;        data: () => {&ndash;&gt;-->
<!--&lt;!&ndash;            return {&ndash;&gt;-->
<!--&lt;!&ndash;                users: [],&ndash;&gt;-->
<!--&lt;!&ndash;                messages: [],&ndash;&gt;-->
<!--&lt;!&ndash;                chatOpen: false,&ndash;&gt;-->
<!--&lt;!&ndash;                chatUserID: null,&ndash;&gt;-->
<!--&lt;!&ndash;                loadingMessages: false,&ndash;&gt;-->
<!--&lt;!&ndash;                newMessage: ''&ndash;&gt;-->
<!--&lt;!&ndash;            }&ndash;&gt;-->
<!--&lt;!&ndash;        },&ndash;&gt;-->
<!--&lt;!&ndash;        created () {&ndash;&gt;-->
<!--&lt;!&ndash;            let app = this&ndash;&gt;-->
<!--&lt;!&ndash;            app.loadUsers()&ndash;&gt;-->
<!--&lt;!&ndash;        },&ndash;&gt;-->
<!--&lt;!&ndash;        watch: {&ndash;&gt;-->
<!--&lt;!&ndash;            messages: function () {&ndash;&gt;-->
<!--&lt;!&ndash;                let element = this.$refs.messageBox&ndash;&gt;-->
<!--&lt;!&ndash;                element.scrollTop = element.scrollHeight&ndash;&gt;-->
<!--&lt;!&ndash;            }&ndash;&gt;-->
<!--&lt;!&ndash;        },&ndash;&gt;-->
<!--&lt;!&ndash;        methods: {&ndash;&gt;-->
<!--&lt;!&ndash;            openChat (userID) {&ndash;&gt;-->
<!--&lt;!&ndash;                let app = this&ndash;&gt;-->
<!--&lt;!&ndash;                if (app.chatUserID !== userID) {&ndash;&gt;-->
<!--&lt;!&ndash;                    app.chatOpen = true&ndash;&gt;-->
<!--&lt;!&ndash;                    app.chatUserID = userID&ndash;&gt;-->

<!--&lt;!&ndash;                    // Start pusher listener&ndash;&gt;-->
<!--&lt;!&ndash;                    Pusher.logToConsole = true&ndash;&gt;-->

<!--&lt;!&ndash;                    var pusher = new Pusher('75f4218eb9e336b5d0d7', {&ndash;&gt;-->
<!--&lt;!&ndash;                        cluster: 'ap2',&ndash;&gt;-->
<!--&lt;!&ndash;                        forceTLS: true&ndash;&gt;-->
<!--&lt;!&ndash;                    })&ndash;&gt;-->

<!--&lt;!&ndash;                    var channel = pusher.subscribe('newMessage-' + app.chatUserID + '-' + app.$root.userID) // newMessage-[chatting-with-who]-[my-id]&ndash;&gt;-->

<!--&lt;!&ndash;                    channel.bind('App\\Events\\MessageSent', function (data) {&ndash;&gt;-->
<!--&lt;!&ndash;                        if (app.chatUserID) {&ndash;&gt;-->
<!--&lt;!&ndash;                            app.messages.push(data.message)&ndash;&gt;-->
<!--&lt;!&ndash;                        }&ndash;&gt;-->
<!--&lt;!&ndash;                    })&ndash;&gt;-->
<!--&lt;!&ndash;                    // End pusher listener&ndash;&gt;-->
<!--&lt;!&ndash;                    app.loadMessages()&ndash;&gt;-->
<!--&lt;!&ndash;                }&ndash;&gt;-->
<!--&lt;!&ndash;            },&ndash;&gt;-->
<!--&lt;!&ndash;            loadUsers () {&ndash;&gt;-->
<!--&lt;!&ndash;                let app = this&ndash;&gt;-->
<!--&lt;!&ndash;                axios.get('api/users/')&ndash;&gt;-->
<!--&lt;!&ndash;                    .then((resp) => {&ndash;&gt;-->
<!--&lt;!&ndash;                        app.users = resp.data&ndash;&gt;-->
<!--&lt;!&ndash;                    })&ndash;&gt;-->
<!--&lt;!&ndash;            },&ndash;&gt;-->
<!--&lt;!&ndash;            loadMessages () {&ndash;&gt;-->
<!--&lt;!&ndash;                let app = this&ndash;&gt;-->
<!--&lt;!&ndash;                app.loadingMessages = true&ndash;&gt;-->
<!--&lt;!&ndash;                app.messages = []&ndash;&gt;-->
<!--&lt;!&ndash;                axios.post('api/messages', {&ndash;&gt;-->
<!--&lt;!&ndash;                    sender_id: app.chatUserID,&ndash;&gt;-->
<!--&lt;!&ndash;                    receiver_id: app.$root.userID&ndash;&gt;-->
<!--&lt;!&ndash;                }).then((resp) => {&ndash;&gt;-->
<!--&lt;!&ndash;                    app.messages = resp.data&ndash;&gt;-->
<!--&lt;!&ndash;                    app.loadingMessages = false&ndash;&gt;-->
<!--&lt;!&ndash;                })&ndash;&gt;-->
<!--&lt;!&ndash;            },&ndash;&gt;-->
<!--&lt;!&ndash;            sendMessage () {&ndash;&gt;-->
<!--&lt;!&ndash;                let app = this&ndash;&gt;-->
<!--&lt;!&ndash;                if (app.newMessage !== '') {&ndash;&gt;-->
<!--&lt;!&ndash;                    axios.post('api/messages/send', {&ndash;&gt;-->
<!--&lt;!&ndash;                        sender_id: app.$root.userID,&ndash;&gt;-->
<!--&lt;!&ndash;                        receiver_id: app.chatUserID,&ndash;&gt;-->
<!--&lt;!&ndash;                        message: app.newMessage&ndash;&gt;-->
<!--&lt;!&ndash;                    }).then((resp) => {&ndash;&gt;-->
<!--&lt;!&ndash;                        app.messages.push(resp.data)&ndash;&gt;-->
<!--&lt;!&ndash;                        app.newMessage = ''&ndash;&gt;-->
<!--&lt;!&ndash;                    })&ndash;&gt;-->
<!--&lt;!&ndash;                }&ndash;&gt;-->
<!--&lt;!&ndash;            }&ndash;&gt;-->
<!--&lt;!&ndash;        }&ndash;&gt;-->
<!--&lt;!&ndash;    }&ndash;&gt;-->
<!--&lt;!&ndash;</script>&ndash;&gt;-->
<!--<template>-->
<!--    <div class="row">-->
<!--        <div class="col-8">-->
<!--            <div class="card card-default">-->
<!--                <div class="card-header">Messages</div>-->
<!--                <div class="card-body p-0">-->
<!--                    <ul class="list-unstyled" style="height:300px; overflow-y:scroll" v-chat-scroll>-->
<!--                        <li class="p-2" v-for="(message, index) in messages" :key="index" >-->
<!--                            <strong>{{ message.user.name }}</strong>-->
<!--                            {{ message.message }}-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="input-group">-->
<!--                    <input-->
<!--                        @keydown="sendTypingEvent"-->
<!--                        @keyup.enter="sendMessage"-->
<!--                        v-model="newMessage"-->
<!--                        type="text"-->
<!--                        name="message"-->
<!--                        placeholder="Enter your message..."-->
<!--                        class="form-control"-->
<!--                        aria-label="Message"-->
<!--                        aria-describedby="message"-->
<!--                    >-->
<!--                    <div class="input-group-append">-->
<!--                        <button-->
<!--                            type="button"-->
<!--                            class="btn btn-outline-success" :class="[newMessage ? null : 'disabled']"-->
<!--                            @click="sendMessage"-->
<!--                        >-->
<!--                            Send-->
<!--                        </button>-->

<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <span class="text-muted" v-if="activeUser" >{{ activeUser.name }} is typing...</span>-->
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
<!--        props:['user'],-->
<!--        data() {-->
<!--            return {-->
<!--                messages: [],-->
<!--                newMessage: '',-->
<!--                users:[],-->
<!--                activeUser: false,-->
<!--                typingTimer: false,-->
<!--            }-->
<!--        },-->
<!--        created() {-->
<!--            this.fetchMessages();-->
<!--            this.startListening();-->
<!--        },-->
<!--        methods: {-->
<!--            startListening() {-->
<!--                var self = this;-->
<!--                Echo.join(`chat`)-->
<!--                    .here(user => {-->
<!--                        self.users = user;-->


<!--                    })-->
<!--                    .joining(user => {-->
<!--                        console.log(self.users);-->
<!--                        self.users.push(user);-->
<!--                    })-->
<!--                    .leaving(user => {-->
<!--                        self.users = self.users.filter(u => u.id != user.id);-->
<!--                    })-->
<!--                    .listen('MessageSent', (event) => {-->
<!--                        self.messages.push(event.chat);-->
<!--                    })-->
<!--                    .listenForWhisper('typing', user => {-->
<!--                        self.activeUser = user;-->
<!--                        if(self.typingTimer) {-->
<!--                            clearTimeout(self.typingTimer);-->
<!--                        }-->
<!--                        self.typingTimer = setTimeout(() => {-->
<!--                            self.activeUser = false;-->
<!--                        }, 500);-->
<!--                    });-->
<!--            },-->
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
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->
