<template>
    <div>
        <form @submit.prevent="store">
            <div v-if="message" class="result">
                {{ message }}
            </div>
            <div v-if="errors" class="errors">
                {{ errors }}
            </div>
            <div class="form-group">
                <textarea
                    name="comment"
                    v-model="comment"
                    class="form-control"
                    required
                ></textarea>
            </div>
            <div class="form-group text-right">
                <input type="hidden" v-model="parent" />
                <input type="submit" class="btn btn-primary" value="Add comment" />
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            comment: "",
            message: "",
            errors: null,
        };
    },
    props: {
        parent: Number,
    },
    methods: {
        store() {
            axios
                .post("/comments", {
                    comment: this.comment,
                    parent_id: this.parent,
                })
                .then((response) => {
                    this.message = response.data.message;
                    this.$root.$emit('add-comment');
                    this.comment = "";
                })
                .catch(
                    ({
                        response: {
                            data: { errors },
                        },
                    }) => {
                        this.errors = errors;
                    }
                );
        },
    },
};
</script>
