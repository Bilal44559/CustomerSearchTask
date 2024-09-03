**Search Implementation:**
I initiated a query on the Customer model and applied filtering based on the search input.
If a search term is provided, I used the where method to filter customers by their email.
To also filter customers based on related orders and items, I used the **whereHas** method.

**Query Optimization:**
To enhance performance, I used eager loading to reduce the number of database queries.
paginated results to limit the amount of data retrieved in one request

**User Experience**
The appends method ensures that the search term is preserved across pagination links, improving user experience.

**Considerations:**
I ensured the search functionality can handle large datasets efficiently by leveraging indexes and careful query construction.
