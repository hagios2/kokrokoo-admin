<template>
  <!--view rate cards -->
  <div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
    id="showRateCardDetails"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Page-header start -->
        <div class="page-header" v-show="processing">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <h4 class="animated fadeIn">
                  <strong class="text-danger" style="padding-left:10px;">{{rate_card_title}}</strong> Rate Card
                  <span  v-show="media != 'Print'">for {{day}}</span>
                </h4>
              </div>
            </div>
          </div>
        </div>
        <!-- Page-header end -->
        <div class="page-body" style="padding:10px;">
          <!-- Default Styling table start -->

          <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-">
              <p v-show="loader">
                <img src="/images/loading.gif" style="height: 20px;width: 20px;" />
                <strong>Loading... Please wait</strong>
              </p>
            </div>
            <div class="col-md-5"></div>
          </div>

          <!--                                <view-print-rate-card v-show="media == 'Print'" :print_segments="print_segments" v-if="processing"></view-print-rate-card>-->
          <div class v-show="media != 'Print'">
            <table class="table table-bordered">
              <thead>
                <tr
                  class="table-primary animated fadeIn"
                  v-show="weekdays"
                  style="background:#313C56;color:#ffffff;"
                >
                  <th>#</th>
                  <!--<th>Rate card ID</th>-->
                  <th>{{days_of_week.mon}}</th>
                  <th>{{days_of_week.tue}}</th>
                  <th>{{days_of_week.wed}}</th>
                  <th>{{days_of_week.thu}}</th>
                  <th>{{days_of_week.fri}}</th>

                  <th v-show="days_of_week.sec1 > 0">{{days_of_week.sec1 + days_of_week.time1}}</th>
                  <th v-show="days_of_week.sec2 > 0">{{days_of_week.sec2 + days_of_week.time2}}</th>
                  <th v-show="days_of_week.sec3 > 0">{{days_of_week.sec3 + days_of_week.time3}}</th>
                  <th v-show="days_of_week.sec4 > 0">{{days_of_week.sec4 + days_of_week.time4}}</th>
                  <th v-show="days_of_week.sec5 > 0">{{days_of_week.sec5 + days_of_week.time5}}</th>
                </tr>

                <!--show if  view weekends button is clicked-->
                <tr
                  class="table-primary animated fadeIn"
                  v-show="weekends"
                  style="background:#313C56;color:#ffffff;"
                >
                  <th>#</th>

                  <th>{{days_of_weekend.sat}}</th>
                  <th>{{days_of_weekend.sun}}</th>

                  <th
                    v-show="days_of_weekend.wsec1 > 0"
                  >{{days_of_weekend.wsec1 + days_of_weekend.time1}}</th>
                  <th
                    v-show="days_of_weekend.wsec2 > 0"
                  >{{days_of_weekend.wsec2 + days_of_weekend.time2}}</th>
                </tr>
              </thead>
              <tbody>
                <!--weekdays segments-->
                <tr
                  class="animated fadeIn"
                  v-for="(cards,rows) in view_rate_card"
                  v-show="weekdays"
                  :key="rows"
                  v-if="cards.wsec1_rate !== ''"
                >
                  <th scope="row">{{rows + 1}}</th>
                  <!--                                            <td>{{card.rate_card_id}}</td>-->
                  <td>
                    {{cards.mon_duration.substr(0,2) + ':' + cards.mon_b_duration}} - {{ cards.mon_c_duration.substr(0,2) + ':'+ cards.mon_d_duration + '' + cards.mon_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + cards.mon_spots}}</span>
                  </td>
                  <td>
                    {{cards.tue_duration.substr(0,2) + ':' + cards.tue_b_duration}} - {{ cards.tue_c_duration.substr(0,2) + ':'+ cards.tue_d_duration + '' + cards.tue_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + cards.tue_spots}}</span>
                  </td>
                  <td>
                    {{cards.wed_duration.substr(0,2) + ':' + cards.wed_b_duration}} - {{ cards.wed_c_duration.substr(0,2) + ':'+ cards.wed_d_duration + '' + cards.wed_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + cards.wed_spots}}</span>
                  </td>
                  <td>
                    {{cards.thu_duration.substr(0,2) + ':' + cards.thu_b_duration}} - {{ cards.thu_c_duration.substr(0,2) + ':'+ cards.thu_d_duration + '' + cards.thu_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + cards.tue_spots}}</span>
                  </td>
                  <td>
                    {{cards.fri_duration.substr(0,2) + ':' + cards.fri_b_duration}} - {{ cards.fri_c_duration.substr(0,2) + ':'+ cards.fri_d_duration + '' + cards.fri_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + cards.fri_spots}}</span>
                  </td>
                  <td v-show="days_of_week.sec1 > 0">{{'GHS'+ cards.sec1_rate}}</td>
                  <td v-show="days_of_week.sec2 > 0">{{'GHS'+ cards.sec2_rate}}</td>
                  <td v-show="days_of_week.sec3 > 0">{{'GHS'+ cards.sec3_rate}}</td>
                  <td v-show="days_of_week.sec4 > 0">{{'GHS'+ cards.sec4_rate}}</td>
                  <td v-show="days_of_week.sec5 > 0">{{'GHS'+ cards.sec5_rate}}</td>
                </tr>

                <!--view weekends-->
                <tr
                  class="animated fadeIn"
                  v-for="(card,index)  in view_rate_card_w"
                  v-show="weekends"
                >
                  <th scope="row">{{index + 1}}</th>
                  <!--<td>{{card.rate_card_id}}</td>-->
                  <td>
                    {{card.sat_duration.substr(0,2) + ':' + card.sat_b_duration}} - {{ card.sat_c_duration.substr(0,2) + ':'+ card.sat_d_duration + '' + card.sat_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + card.sat_spots}}</span>
                  </td>
                  <td>
                    {{card.sun_duration.substr(0,2) + ':' + card.sun_b_duration}} - {{ card.sun_c_duration.substr(0,2) + ':'+ card.sun_d_duration + '' + card.sun_c_duration.substr(2,3)}}
                    <span
                      class="pull-right text-primary"
                      style="font-weight:bolder"
                    >{{'SPOTS :' + card.sun_spots}}</span>
                  </td>
                  <td v-show="days_of_weekend.wsec1 > 0 ">{{'GHS'+ card.wsec1_rate}}</td>
                  <td v-show="days_of_weekend.wsec2 > 0">{{'GHS'+ card.wsec2_rate}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer" v-show="processing">
          <button
            type="button"
            v-show="media != 'Print'"
            class="btn btn-primary"
            @click="viewWeekendSegments"
          >{{label}}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "rateCard",
  props: ["id", "user_id"],

  data() {
    return {
      rate_card_title: null,
      view_rate_card: [],
      view_rate_card_w: [],
      days_of_week: [],
      weekends: false,
      weekdays: true,
      days_of_weekend: [],
      label: "View Weekends Segments",
      day: "weekdays",
      media_h: "",
      print_segments: [],
      processing: false,
      loader: true,
      medi: "",
      media: ""
    };
  },
  mounted() {
    this.getClickedRateCardId();
  },
  methods: {
    getClickedRateCardId() {
      let self = this;
      let ratecard_id = null;
      let media_type = null;
      $(document).on("click", ".viewRateCard", function() {
        ratecard_id = $(this).attr("data-id");
        media_type = $(this).attr("data-media");
        self.media = media_type;

        $("#showRateCardDetails").modal("show");
        self.getRateCard(ratecard_id, media_type);
      });
    },
    getRateCard(id, media_type) {
      let self = this;
      self.loader = true;
      //   let m = self.media.toLowerCase();
      //   self.medi = m.charAt(0).toUpperCase() + m.slice(1);
      if (media_type == "Print") {
        axios
          .get("view-ratecard-api/" + id + "/" + media_type)
          .then(function(res) {
            if (res.data) {
              self.print_segments = res.data.rate_card;

              self.rate_card_title = res.data.rate_card_title;
              // $('.bd-example-modal-lg1').modal('show');
              self.loader = false;
              self.processing = true;
            }
          });
      } else {
        self.loader = true;
        axios
          .get("view-ratecard-api/" + id + "/" + media_type)
          .then(function(res) {
            if (res.data) {
              console.log(res.data.w_segments);
              self.view_rate_card = JSON.parse(res.data.segments);
              self.days_of_week = JSON.parse(res.data.days_of_week);
              self.days_of_weekend = JSON.parse(res.data.days_of_weekends);
              self.rate_card_title = res.data.rate_card_title;
              self.view_rate_card_w = res.data.w_segments;

              self.loader = false;
              self.processing = true;
              //   $('.bd-example-modal-lg1').modal('show');
            }
          });
      }
    },
    getSelectedRatedCard(id, media_type) {
      let self = this;
      self.loader = true;
      //   let m = self.media.toLowerCase();
      //   self.medi = m.charAt(0).toUpperCase() + m.slice(1);
      if (media_type == "Print") {
        axios
          .get("view-ratecard-api/" + id + "/" + media_type)
          .then(function(res) {
            if (res.data) {
              self.print_segments = res.data.rate_card;

              self.rate_card_title = res.data.rate_card_title;
              // $('.bd-example-modal-lg1').modal('show');
              self.loader = false;
              self.processing = true;
            }
          });
      } else {
        self.loader = true;
        axios
          .get("view-ratecard-api/" + id + "/" + media_type)
          .then(function(res) {
            if (res.data) {
              console.log(res.data.w_segments);
              self.view_rate_card = JSON.parse(res.data.segments);
              self.days_of_week = JSON.parse(res.data.days_of_week);
              self.days_of_weekend = JSON.parse(res.data.days_of_weekends);
              self.rate_card_title = res.data.rate_card_title;
              self.view_rate_card_w = res.data.w_segments;

              self.loader = false;
              self.processing = true;
              //   $('.bd-example-modal-lg1').modal('show');
            }
          });
      }
    },
    viewWeekendSegments() {
      if (this.label === "View Weekends Segments") {
        this.label = "View Weekdays Segments";
        this.weekdays = false;
        this.weekends = true;
        this.day = "Weekends";
      } else {
        this.label = "View Weekends Segments";
        this.weekdays = true;
        this.weekends = false;
        this.day = "Weekdays";
      }
    }
  }
};
</script>

