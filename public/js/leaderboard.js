<table class="table table-condensed table-striped" width="647">
  <thead class="thead-default">
    <tr>
      <th class="col-md-1">Rank</th>
      <th class="col-md-2">Tenant</th>
      <th class="col-md-5">Text Message</th>
      <th class="col-md-2">Last date updated</th>
      <th class="col-md-1"2>Messages sent</th>
      <th class="col-md-1">Conversion rate</th>
    </tr>
  </thead>
  <tbody>
        {{#each tenants}}
        <tr>
            <td class="center number" id="rank"></td>
            <td>{{ cust_name }}</td>
            <td>{{ ad_text }}</td>
            <td>{{ insert_time }}</td>
            <td>{{ total_sms }}</td>
            <td>{{ conversion_rate }}%</td>
        </tr>
        {{/each}}  
  </tbody>
</table>