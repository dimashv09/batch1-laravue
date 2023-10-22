 <template>
  <div class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed" :class="{ 'c-sidebar-lg-show': !$page.url.startsWith('/apps/transactions') }" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none" style="background: #282D34 ;">
        <img src="/images/cash-machine.png" class="bg-light rounded shadow-sm p-1" width="35"> <span class="ml-2 font-weight-bold" style="font-size: 25px">Sarawi</span><span class="font-weight-bold" style="font-size: 26px; color:crimson">Store</span><span class="font-weight-bold" style="font-size: 25px">.</span>
      </div>

      <!-- user -->
      <div class="c-sidebar-title mt-3 mb-3 ml-3" style="color:#ffffff;font-family: Arial, Helvetica, sans-serif;">
            <i class="fa fa-user-md me-2"></i><span class="" :auth="user">{{ auth.user.name }}</span> 
      </div>

      <!-- sidebar -->
      <Sidebar />
      <!-- end sidebar -->

    </div>
    <div class="c-wrapper c-fixed-components">
      
      <!-- header -->
      <Header />
      <!-- end header -->

      <div class="c-body">

        <!-- content -->
        <slot />
        <!-- end content -->

        <footer class="c-footer">
          <div><strong>SarawiStore.</strong> | @copyright2023 - AwiMahmud</div>
        </footer>
      </div>
    </div>
  </div>
</template>

<script>

  import Header from '../Components/Header.vue'
  import Sidebar from '../Components/Sidebar.vue'

  export default {

    //register components
    components: {
      Header,
      Sidebar
    },

    props: {
      auth: Object
    }
  }
</script>

<!-- <style>
</style> -->