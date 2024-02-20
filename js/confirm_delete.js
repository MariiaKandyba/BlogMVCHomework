function confirmDelete(id) {
  const confirmed = confirm('Are you sure you want to delete this article?');
  if (confirmed) {
      window.location.href = `main/delete/${id}`;
  }
}