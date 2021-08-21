<template>
  <div>
      <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Doctors Report</h5>
                <div id="date">
                    <div>
                     
 <select class="select2 form-select shadow-none col-md-5"
                                            style="width: 20%; height:36px; position: absolute;
    left: 800px; " v-model="sellectedDate">
                       <option value="today">today</option>
                         <option value="yesterday">yesterday</option>
                           <option value="month">this month</option>
                           <option value="year" >this year</option>
                   </select>
                    </div>
                  
                    </div>

          

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
                                    <td>{{doctor.interview_count}}</td>
                                    
                                  
                                     
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
                    this.doctors = res.data;
                }).catch(error => {
                    console.log(console.error);
                });
            }
        }
};
</script>

<style>
#date{
    position: relative;
    padding: 7px;
  
}
select{
    
    padding: 7px;
    width: 150px;
    border-block-color:#080;
    border-block-start-color: chartreuse;
    border-block-start-width: 2px;
}
option{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 15px;
}

</style>