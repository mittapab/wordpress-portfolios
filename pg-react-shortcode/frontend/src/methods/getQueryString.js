export function getEnvironmentFromUrl() {
  return window.location.pathname?.replace("/", "")
    ? window.location.pathname?.replace("/", "")
    : "prod";
}
