<script type="text/template" data-grid="main" data-template="results">

    <% _.each(results, function(r){ %>

    <tr>
        <td>
            <input data-grid-checkbox type="checkbox" name="entries[]" value="<%= r.id %>">
        </td>
        <td><%= r.id %></td>
        <td><a href="<%= r.view_url %>"> <%= r.subject %> </a></td>
        <td><%= r.created_at %></td>
        <td><%= r.created_by %></td>
        <td><%= r.priority %></td>
        <td><%= r.status %></td>
    </tr>

    <% }); %>

</script>
