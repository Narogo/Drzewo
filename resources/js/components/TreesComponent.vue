<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Nazwa węzła</div>

                    <div class="card-body">
                        <form>
                            <label>
                                <input type="text" v-model="name">
                            </label>
                            <button type ="submit" class="btn btn-success" @click.prevent="Add">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Rodzic węzła</div>

                    <div class="card-body">
                        <select class="custom-select mr-sm-2" v-model="selected">
                            <option v-for="branch in branchs" :key="branch.id" >{{branch.id}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Usuń </div>

                    <div class="card-body">
                        <form>
                            <button type ="submit" class="btn btn-danger" @click.prevent="Delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Nowy rodzic</div>

                    <div class="card-body">
                        <label>
                            <select class="custom-select mr-sm-2" v-model="selectedM">
                                <option v-for="branch in branchs" :key="branch.id" >{{branch.id}}</option>
                            </select>
                        </label>
                        <br>
                        <button type ="submit" class="btn btn-warning" @click.prevent="Move">Przenieś węzeł</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Zmień nazwe</div>

                    <div class="card-body">
                        <form>
                            <label>
                                <input type="text" v-model="newName">
                            </label>
                            <br>
                            <button type="submit" class="btn btn-primary" @click.prevent="Update">Zmień</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 float-right">
            <div class="card">
                <div class="card-header">Usuń Wszystko</div>

                <div class="card-body">
                    <form>
                        <button type ="submit" class="btn btn-danger" @click.prevent="deleteAll">Usuń wszystko</button>

                    </form>
                </div>
            </div>
            <br>
        </div>

    </div>
</template>

<script>
    export default
    {
        data()
        {
            return{
                name: '',
                newName:'',
                branchs: [],
                selected: '1',
                selectedM: '1',
            }
        },
        mounted()
        {

        },
        methods : {
            Add(){
                axios.post('Add',{
                    name : this.name,
                    selected : this.selected
                })
                    .then(response => console.log(response));
            },
            Move(){
                axios.put('Move',{
                    selected : this.selected,
                    selectedM : this.selectedM
                })
                    .then(response => console.log(response));
            },
            Update(){
                axios.put('Update',{
                    newName : this.newName,
                    selected : this.selected,
                })
                    .then(response => console.log(response));
            },
            Delete(){
                axios.post('Delete',{
                    selected : this.selected
                })
                    .then(response => console.log(response));
            },
            deleteAll(){
                axios.post('deleteAll')
                    .then(response => console.log(response));
            }
        },
        created() {
            axios.get('allBranch')
                .then(response=>this.branchs = response.data);
        }

    }
</script>

<style scoped>

</style>
