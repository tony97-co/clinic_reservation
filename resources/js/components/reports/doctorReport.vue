<template>
  <div>
      <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Doctors Report</h5>
             

            </div>
            <table class="table">
                <thead>
                    <tr>
                     
                
                          <th>Name</th>
                        
                          <th>address</th>
                          <th>Specialty</th>
                         <th>Qualifications </th>
                          <th>Start date</th>
                          <th>Diagnosis prise</th>
                          <th>Reservaations Count</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="doctor in doctors" v-bind:key="doctor.id">
                                      <td>{{doctor.user.user_name}}</td>
                                           <td>{{doctor.address}}</td>
                                        <td>{{doctor.specialist.specalty_name}}</td>
                                       <td>{{doctor.qualifications}}</td>
                                     <td>{{doctor.start_date}}</td>
                                      <td>{{doctor.price}}</td>
                                    <td>{{doctor.interviews_count}}</td>
                                    
                                  
                                     
                    </tr>
                 
                </tbody>
            </table>
        </div>
  </div>
      </div>
      </div>
</template>

<script>
export default {
   
  mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                doctors:[],
                sellectedDate:null
            }
        },
        created(){
this.getdoctors();
        },
        watch:{
            sellectedDate(){
      this.getdoctors()
            }
            
        },
        methods:{
            getdoctors(){
                axios.get("/d",{params:{
                    date:this.sellectedDate
                }

                }
                ).then(res => {
                    this.doctors = res.data.data;
                }).catch(error => {
                    console.log(console.error);
                });
            }
        }
};
</script>

<style>


</style>